<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use Illuminate\Http\Request;

class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classes::all();

        return view('dashbord.Class.index', compact('classes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashbord.Class.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate(['class_name' => 'required|unique:classes']);
        Classes::create($validate);
        $notification = [
            'message' => 'Class Create Successfull',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     */
    public function show(Classes $class)
    {
        return $class;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Classes $class)
    {
        return view('dashbord.Class.edit', compact('class'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classes $class)
    {
        $validate = $request->validate(['class_name' => 'required|unique:classes,class_name,'.$class->id]);
        $class->update($validate);
        $notification = [
            'message' => 'Class updated',
            'alert-type' => 'info',
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classes $class)
    {
        $class->delete();
        $notification = [
            'message' => ' class Deleted!',
            'alert-type' => 'info',
        ];

        return redirect()->back()->with($notification);
    }
}
