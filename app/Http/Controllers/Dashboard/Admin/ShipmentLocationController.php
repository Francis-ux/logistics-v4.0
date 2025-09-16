<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\Shipment;
use Illuminate\Http\Request;
use App\Models\ShipmentLocation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\Shipment as ShipmentMail;
use App\Http\Requests\StoreShipmentLocationRequest;

class ShipmentLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(StoreShipmentLocationRequest $request, string $shipmentUUID)
    {
        $validated = $request->validated();
        try {
            DB::beginTransaction();

            $shipment = Shipment::where('uuid', $shipmentUUID)->firstOrFail();

            $validated['uuid'] = str()->uuid();
            $validated['shipment_id'] = $shipment->id;
            $validated['status'] = $validated['shipment_status'];

            $shipment->status = $validated['status'];
            $shipment->current_location = $validated['location'];

            ShipmentLocation::create($validated);
            $shipment->update();

            if ($validated['notification'] === 'Email') {
                Mail::to($shipment->client_email)->queue(new ShipmentMail($shipment, 'Parcel Status Notification' . now()));
                Mail::to($shipment->sender_email)->queue(new ShipmentMail($shipment, 'Parcel Status Notification' . now()));
                // Mail::to($shipment->sender_email)->later(now()->addMinutes(1), new ShipmentMail($shipment, 'Parcel Status Notification' . now()));
            }

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
    public function destroy(string $shipmentLocationUUID)
    {
        try {
            DB::beginTransaction();

            $shipmentLocation = ShipmentLocation::where('uuid', $shipmentLocationUUID)->firstOrFail();

            $shipmentLocation->delete();

            DB::commit();

            return redirect()->back()->with('success', config('messages.success'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('messages.error'));
        }
    }
}
