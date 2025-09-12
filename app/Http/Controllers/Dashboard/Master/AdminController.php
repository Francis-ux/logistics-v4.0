<?php

namespace App\Http\Controllers\Dashboard\Master;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminControllerUpdateRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Admins', 'url' => route('master.admin.index'), 'active' => true]
        ];

        $data = [
            'title' => 'Admins',
            'breadcrumbs' => $breadcrumbs,
            'admins' => User::where('role', 'admin')->latest()->get()
        ];

        return view('dashboard.master.admin.index', $data);
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
    public function edit(string $uuid)
    {
        $breadcrumbs = [
            ['label' => config('app.name'), 'url' => '/'],
            ['label' => 'Admins', 'url' => route('master.admin.index')],
            ['label' => 'Edit Admin', 'url' => route('master.admin.edit', $uuid), 'active' => true]
        ];

        $data = [
            'title' => 'Edit Admin',
            'breadcrumbs' => $breadcrumbs,
            'admin' => User::where('uuid', $uuid)->first()
        ];

        return view('dashboard.master.admin.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AdminControllerUpdateRequest $request, string $uuid)
    {
        $request->validated();

        try {
            DB::beginTransaction();

            $admin = User::where('uuid', $uuid)->where('role', 'admin')->firstOrFail();

            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'is_active' => $request->is_active,
            ];

            if ($request->password) {
                $data['password'] = Hash::make($request->password);
            }

            $admin->update($data);

            DB::commit();
            return redirect()->route('master.admin.index')->with('success', config('messages.success'));
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error($e->getMessage());
            return redirect()->back()->with('error', config('messages.error'));
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
