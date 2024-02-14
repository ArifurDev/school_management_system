<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Dashbord\BaseController as BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Spatie\Permission\Models\Role;

class UserController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role_or_permission:User access|User create|User edit|User delete|User update role', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:User create', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:User edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:User delete', ['only' => ['destroy']]);
        $this->middleware('role_or_permission:User update role', ['only' => ['edit', 'userUpdateRole']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::where('student_status', '0')->latest()->get();

        return view('dashbord.User.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();

        return view('dashbord.User.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'role' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg',
            'phone' => 'required|min:11|max:12',
            'password' => 'required|min:6',
            'password_confirm' => 'required|same:password',  // required and has to match the password field
        ]);

        //image upload image
        if ($request->hasFile('image')) {
            // $image = $request->file('image');
            // $file_name = $request->name.$request->phone.'.'.$image->getClientOriginalExtension();
            // $file_path = 'upload/users_image/'.$file_name;
            // Storage::disk('public')->put($file_path, $image->get());

            $image = $request->file('image');
            $file_name = $request->phone.time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/images', $file_name);
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'image' => $file_name,
            'address' => $request->address,
            'phone' => $request->phone,
            'created_at' => Carbon::now(),
        ]);
        $user->assignRole($request->role);

        return $this->returnMessage('Account create successfulliy', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('dashbord.User.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $role = Role::all();

        return view('dashbord.User.edit', compact('role', 'user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {

        $request->validate([
            'email' => 'required|email|unique:users,email,'.$user->id,
            'image' => 'mimes:png,jpg,jpeg',
            'phone' => 'min:11|max:12',
        ]);

        $user->update([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'address' => $request['address'],
        ]);
        //image check and upload
        if ($request->hasFile('image')) {
            $request->validate(['image' => 'mimes:png,jpg,jpeg']);
            //delete old image from folder
            unlink('storage/upload/users_image/'.$user->user_info->image);

            $image = $request->file('image');
            $file_name = $user->id.'.'.$image->getClientOriginalExtension();
            $file_path = 'upload/users_image/'.$file_name;
            Storage::disk('public')->put($file_path, $image->get());

            $user->update([
                'image' => $file_name,
            ]);
        }

        return $this->returnMessage('Account Update successfulliy', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        return $user;
    }

    /**
     * update role
     */
    public function userUpdateRole(Request $request, User $user)
    {
        $request->validate(['role' => 'required']);
        // assine roles
        $auth_user_id = Auth::user()->id;
        $user_old_role = $user->roles->first()->name;

        if ($user->id == $auth_user_id) {
            $auth_role = Auth::user()->roles->first()->name;

            if ($auth_role == 'admin' && $request->role == 'admin') {
                return $this->returnMessage("your role admin. you dont'n change your role", 'error');
            }

        } else {
            $user->removeRole($user_old_role);
            $user->assignRole($request->role);

            return $this->returnMessage('Role update successfull', 'info');
        }
    }
}
