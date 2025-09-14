<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrackingControllerStoreRequest;
use App\Models\Shipment;
use Illuminate\Support\Facades\Log;

class TrackingController extends Controller
{
    public function index()
    {
        $data = ['title' => 'Tracking'];

        return view('frontend.tracking.index', $data);
    }

    public function store(TrackingControllerStoreRequest $request)
    {
        $request->validated();

        try {
            $shipment = Shipment::where('tracking_code', $request->tracking_number)->first();

            if (!$shipment) {
                session()->flash('error', 'Invalid tracking code');
                return back()->withErrors([
                    'tracking_number' => 'Invalid tracking code',
                ])->onlyInput('email');
            }

            return redirect()->route('tracking.show', $shipment->uuid)->with('success', 'Shipment found');
        } catch (\Exception $e) {
            Log::error($e->getMessage());

            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function show(string $uuid)
    {
        $shipment = Shipment::with(['shipmentLocation'])->where('uuid', $uuid)->first();

        $data = [
            'title' => 'Tracking Details',
            'shipment' => $shipment,
            'shipmentLocations' => $shipment->shipmentLocation()->latest()->get(),
        ];

        return view('frontend.tracking.show', $data);
    }
}
