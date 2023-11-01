<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Dashbord\BaseController as BaseController;
use App\Models\Classes;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();

        return view('dashbord.Subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Classes = Classes::all();

        return view('dashbord.Subject.create', compact('Classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'classes_id' => 'required',
            'name' => 'required|unique:subjects,subject_name',
        ]);

        Subject::insert([
            'classes_id' => $request->classes_id,
            'subject_name' => $request->name,
            'subject_code' => $request->code,
        ]);

        return $this->returnMessage('Subject Add Successfulliy', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $Subject)
    {
        $Classes = Classes::all();

        return view('dashbord.Subject.edit', compact('Subject', 'Classes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $validation = $request->validate(['name' => ['required', 'unique:subjects,subject_name,'.$subject->id]]);

        $subject->update([
            'classes_id' => $request->classes_id,
            'subject_name' => $request->name,
            'subject_code' => $request->code,
        ]);

        return $this->returnMessage('Subject Updated', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        $subject->delete();

        return $this->returnMessage('Subject Deleted', 'warning');
    }
}
