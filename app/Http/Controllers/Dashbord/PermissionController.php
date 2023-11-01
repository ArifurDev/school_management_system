<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Dashbord\BaseController as BaseController;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends BaseController
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

        return $this->returnMessage('Permission Create Successfulliy', 'success');
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

        return $this->returnMessage('Permission updated Successfulliy', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();

        return $this->returnMessage($permission->name.' Permission Delete Successfull', 'info');
    }

    /**
     * Attach Role to Permissions
     */
    public function attachRole(Request $request, Permission $permission)
    {
        if ($permission->hasRole($request->role)) {
            return $this->returnMessage('This Role already exists', 'error');
        } else {
            $permission->assignRole($request->role);

            return $this->returnMessage('The '.$request->role.' has been attached successfully', 'success');
        }
    }

    /**
     * A role can be revoked from a permission
     */
    public function revokRole(Permission $permission, Role $role)
    {
        if ($permission->hasRole($role)) {
            $permission->removeRole($role);

            return $this->returnMessage('A permission can be remove from a role', 'info');
        }
    }
}
