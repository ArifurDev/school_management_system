<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Dashbord\BaseController as BaseController;
use App\Models\Classes;
use App\Models\Subject;
use Illuminate\Http\Request;

class ClassesController extends BaseController
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

        return $this->returnMessage('Class Create Successfull', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Classes $class)
    {
        $subjectes = Subject::where('classes_id', $class->id)->get();

        return view('dashbord.Class.show', compact('class', 'subjectes'));
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

        return $this->returnMessage('Class updated', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classes $class)
    {
        $class->delete();

        return $this->returnMessage('class Deleted!', 'info');
    }
}
