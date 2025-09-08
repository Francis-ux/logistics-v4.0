<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Shipment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Welcome Admin', 'url' => route('admin.dashboard'), 'active' => true]
        ];

        $shipments = Shipment::latest()->get();

        $data = [
            'title' => 'Welcome Admin',
            'breadcrumbs' => $breadcrumbs,
            'shipments' => $shipments
        ];

        return view('dashboard.admin.index', $data);
    }
}
