<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CargoTrackingControllerStoreRequest;
use App\Models\Shipment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CargoTrackingController extends Controller
{
    public function index()
    {
        $data = ['title' => 'Cargo Tracking'];

        return view('frontend.cargo_tracking.index', $data);
    }

    public function store(CargoTrackingControllerStoreRequest $request)
    {
        $request->validated();

        try {
            $shipment = Shipment::where('tracking_number', $request->tracking_code)->first();

            if (!$shipment) {
                return redirect()->back()->with('error', 'Invalid tracking code');
            }

            return redirect()->route('cargo.tracking.show', $shipment->uuid)->with('success', 'Shipment found');
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }

    public function show(string $uuid)
    {
        $shipment = Shipment::with(['shipmentLocation'])->where('uuid', $uuid)->first();

        $data = [
            'title' => 'Cargo Tracking Details',
            'shipment' => $shipment,
        ];

        return view('frontend.cargo_tracking.show', $data);
    }
}
