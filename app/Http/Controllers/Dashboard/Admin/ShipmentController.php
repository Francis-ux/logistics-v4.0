<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\Shipment;
use App\Enum\ShipmentStatus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreShipmentRequest;
use App\Trait\FileUpload;
use Illuminate\Support\Facades\Log;

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
            $validated['image'] = $this->imageInterventionUploadFile($request, 'image', '/uploads/shipment/image/', 550, 550);
            $validated['tracking_code'] = getTrackingNumber(config('app.name'));

            Shipment::create($validated);

            DB::commit();

            return redirect()->route('admin.shipment.index')->with('success', config('messages.success'));
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
        $shipment = Shipment::where('uuid', $uuid)->firstOrFail();

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd('shipment destroy');
    }

    public function download(string $id)
    {
        //
    }
}
