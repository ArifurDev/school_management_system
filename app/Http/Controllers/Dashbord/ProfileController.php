<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Dashbord\BaseController as BaseController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Auth student role check
        $student = User::where('id', Auth::id())->whereHas('roles', function ($query) {
            $query->where('name', 'student');
        })->exists(); // Check if any user with the given ID has the student role

        if ($student) {
            $authProfile = $this->Profile(Auth::user());

            return view('dashbord.AuthProfile.profile', $authProfile);
        } else {
            return $this->returnMessage('Only Student Profile', 'error');
        }

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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
