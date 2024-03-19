<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Dashbord\BaseController as BaseController;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class ClassesController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role_or_permission:Classes access|Classes create|Classes edit|Classes delete', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Classes create', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Classes edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Classes delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classes::all();

        $head_teachers = User::whereHas('roles', function ($query) {
            $query->where('name', 'Head Teacher');
        })->select('id', 'name')->get(); // Check if any user with the given ID has the Head Teacher role

        return view('dashbord.Class.index', compact('classes', 'head_teachers'));
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
        $validate = $request->validate([
            'class_name' => 'required|unique:classes',
            'head_teacher_id' => 'required|unique:classes',
        ]);
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
        $head_teachers = User::whereHas('roles', function ($query) {
            $query->where('name', 'Head Teacher');
        })->select('id', 'name')->get(); // Check if any user with the given ID has the Head Teacher role

        return view('dashbord.Class.edit', compact('class', 'head_teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Classes $class)
    {
        $validate = $request->validate([
            'class_name' => 'required|unique:classes,class_name,'.$class->id,
            'head_teacher_id' => 'required|unique:classes,head_teacher_id,'.$class->id,
        ]);
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
