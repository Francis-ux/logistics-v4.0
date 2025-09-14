<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\Shipment;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShipmentRequest;
use App\Http\Requests\UpdateShipmentRequest;
use App\Models\ShipmentLocation;
use App\Trait\FileUpload;
use Illuminate\Support\Facades\Log;
use Barryvdh\DomPDF\Facade\Pdf;

class ShipmentController extends Controller
{
    use FileUpload;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Shipments', 'url' => route('admin.shipment.index'), 'active' => true]
        ];

        $shipments = Shipment::latest()->get();

        $data = [
            'title' => 'Shipments',
            'breadcrumbs' => $breadcrumbs,
            'shipments' => $shipments
        ];

        return view('dashboard.admin.shipment.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Shipments', 'url' => route('admin.shipment.index')],
            ['label' => 'Create Shipment', 'url' => route('admin.shipment.create'), 'active' => true]
        ];

        $data = [
            'title' => 'Create Shipment',
            'breadcrumbs' => $breadcrumbs,
        ];

        return view('dashboard.admin.shipment.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreShipmentRequest $request)
    {
        $validated = $request->validated();

        try {
            DB::beginTransaction();

            $validated['uuid'] = str()->uuid();
            $validated['status'] = $validated['shipment_status'];
            $validated['image'] = $this->imageInterventionUploadFile($request, 'image', '/uploads/shipment/image/', 550, 550);
            $validated['tracking_code'] = getTrackingNumber(config('app.name'));
            $validated['last_update'] = $validated['departure_date'] . ' ' . $validated['departure_time'];

            $shipment = Shipment::create($validated);

            ShipmentLocation::create([
                'uuid' => str()->uuid(),
                'shipment_id' => $shipment->id,
                'location' => $shipment->current_location,
                'google_map_location' => $shipment->current_location,
                'description' => $shipment->description,
                'date' => $shipment->departure_date,
                'time' => $shipment->departure_time,
                'status' => $shipment->status->value
            ]);

            DB::commit();

            return redirect()->route('admin.shipment.show', ['shipment' => $shipment->uuid])->with('success', config('messages.success'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('messages.error'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $uuid)
    {
        $shipment = Shipment::with('shipmentLocation')->where('uuid', $uuid)->firstOrFail();

        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Shipments', 'url' => route('admin.shipment.index')],
            ['label' => 'Shipment Details', 'url' => route('admin.shipment.show', $uuid), 'active' => true]
        ];

        $data = [
            'title' => 'Shipment Details',
            'breadcrumbs' => $breadcrumbs,
            'shipment' => $shipment
        ];

        return view('dashboard.admin.shipment.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Shipments', 'url' => route('admin.shipment.index')],
            ['label' => 'Edit Shipment', 'url' => route('admin.shipment.edit', $uuid), 'active' => true]
        ];

        $shipment = Shipment::where('uuid', $uuid)->firstOrFail();

        $data = [
            'title' => 'Edit Shipment',
            'breadcrumbs' => $breadcrumbs,
            'shipment' => $shipment
        ];

        return view('dashboard.admin.shipment.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateShipmentRequest $request, string $uuid)
    {
        $validated = $request->validated();

        try {
            DB::beginTransaction();

            $shipment = Shipment::where('uuid', $uuid)->firstOrFail();

            $validated['image'] = $this->imageInterventionUpdateFile($request, 'image', '/uploads/shipment/image/', 550, 550, $shipment->image);

            $shipment->update($validated);

            DB::commit();

            return redirect()->route('admin.shipment.show', ['shipment' => $shipment->uuid])->with('success', config('messages.success'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('messages.error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $uuid)
    {
        try {
            DB::beginTransaction();

            $shipment = Shipment::where('uuid', $uuid)->firstOrFail();

            $oldImage = $shipment->image;

            $shipment->delete();

            DB::commit();

            $this->deleteFile($oldImage);

            return redirect()->route('admin.shipment.index')->with('success', config('messages.success'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('messages.error'));
        }
    }

    public function download(string $uuid)
    {
        try {
            $shipment = Shipment::with('shipmentLocation')->where('uuid', $uuid)->firstOrFail();

            getQRCode(route('tracking.show', $shipment->uuid));

            $data = [
                'shipment' => $shipment,
            ];

            $name = config('app.name') . '-' . 'Receipt';

            $pdf = Pdf::loadView('pdf.shipment', $data);

            if (config('app.env') == 'production') {
                return $pdf->download($name);
            } else {
                return $pdf->stream($name);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('messages.error'));
        }
    }
}
