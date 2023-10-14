<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:Role access|Role create|Role edit|Role delete', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Role create', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Role edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Role delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();

        return view('dashbord.Role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashbord.Role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate(['name' => ['required', 'min:4', 'unique:roles,name']]);

        Role::create($validation);

        $notification = [
            'message' => 'Role Create Successfull',
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
    public function edit(Role $role)
    {
        $permissions = Permission::all();

        return view('dashbord.Role.edit', compact('role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $validation = $request->validate(['name' => ['required', 'min:4', 'unique:roles,name']]);
        $role->update($validation);

        $notification = [
            'message' => 'Role Updated Successfull',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        $notification = [
            'message' => $role->name.' Role Delete Successfull',
            'alert-type' => 'info',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Attach Permissions to Role
     * This route is used to attach permissions to a specific role in the application.
     */
    public function attachPermissions(Request $request, Role $role)
    {
        if ($role->hasPermissionTo($request->permission)) {
            $notification = [
                'message' => 'This permission already exists',
                'alert-type' => 'error',
            ];

            return redirect()->back()->with($notification);
        } else {
            $role->givePermissionTo($request->permission);
            $notification = [
                'message' => 'The '.$request->permission.' has been attached successfully',
                'alert-type' => 'success',
            ];

            return redirect()->back()->with($notification);
        }
    }

    /**
     * A permission can be revoked from a role
     */
    public function revokPermissions(Role $role, Permission $permission)
    {
        if ($role->hasPermissionTo($permission)) {
            $role->revokePermissionTo($permission);
            $notification = [
                'message' => 'A permission can be revoked from a role',
                'alert-type' => 'info',
            ];

            return redirect()->back()->with($notification);
        }
    }
}
