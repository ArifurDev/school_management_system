<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:Permission access|Permission create|Permission edit|Permission delete', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Permission create', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Permission edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Permission delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();

        return view('dashbord.Permission.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashbord.Permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate(['name' => 'required']);
        Permission::create($validation);
        $notification = [
            'message' => 'Permission Create Successfull',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
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
    public function edit(Permission $permission)
    {
        $roles = role::all();

        return view('dashbord.Permission.edit', compact('permission', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $validation = $request->validate(['name' => ['required', 'unique:permissions,name,'.$request->id]]);
        $permission->update($validation);
        $notification = [
            'message' => 'Permission updated Successfull',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        $notification = [
            'message' => $permission->name.' Permission Delete Successfull',
            'alert-type' => 'info',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Attach Role to Permissions
     */
    public function attachRole(Request $request, Permission $permission)
    {
        if ($permission->hasRole($request->role)) {
            $notification = [
                'message' => 'This Role already exists',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        } else {
            $permission->assignRole($request->role);
            $notification = [
                'message' => 'The '.$request->role.' has been attached successfully',
                'alert-type' => 'success',
            ];

            return redirect()->back()->with($notification);
        }
    }

    /**
     * A role can be revoked from a permission
     */
    public function revokRole(Permission $permission, Role $role)
    {
        if ($permission->hasRole($role)) {
            $permission->removeRole($role);
            $notification = [
                'message' => 'A permission can be remove from a role',
                'alert-type' => 'info',
            ];

            return redirect()->back()->with($notification);
        }
    }
}
