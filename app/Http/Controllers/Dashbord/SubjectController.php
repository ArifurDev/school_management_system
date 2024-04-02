<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Dashbord\BaseController as BaseController;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role_or_permission:Subject access|Subject create|Subject edit|Subject delete', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Subject create', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Subject edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Subject delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (User::hasRoleChecker('Head Teacher')) {
            // Get all subjects for head teacher
            $class = Classes::where('head_teacher_id', Auth::user()->id)->select('id')->first();
            $subjects = Subject::where('classes_id', $class->id)->get();
        } elseif (User::hasRoleChecker('Teacher')) {
            // Get only own subjects for teachers
            $subjects = Subject::where('class_teacher_id', Auth::id())->get();
        } else {
            // Get all subjects
            $subjects = Subject::all();
        }

        return view('dashbord.Subject.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Classes = Classes::all();

        $teachers = User::getTeachers();

        return view('dashbord.Subject.create', compact('Classes', 'teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'class_teacher_id' => 'required',
            'classes_id' => 'required',
            'total_class' => 'required|numeric',
            'subject_name' => 'required',
            'attendances_marks' => 'required|numeric',
            'class_teacher_id' => 'required|unique:subjects',
        ], [
            'classes_id.required' => 'Select class name',
            'total_class.required' => 'Total Class is emty!',
            'total_class.numeric' => 'Enter Numeric Value Only!',
            'subject_name.required' => 'The Subject field is required!',
            'attendances_marks.required' => 'Attendances Marks Field Is Emty!',
        ]);
        // Insert Data into database

        $subject_insert_check = Subject::where('classes_id', $request->classes_id)->where('subject_name', $request->subject_name)->first();

        if (! $subject_insert_check) {
            Subject::insert([
                'class_teacher_id' => $request->class_teacher_id,
                'classes_id' => $request->classes_id,
                'subject_name' => $request->subject_name,
                'subject_code' => $request->code,
                'total_class' => $request->total_class,
                'attendances_marks' => $request->attendances_marks,
            ]);

            return $this->returnMessage('Subject Add Successfulliy', 'success');
        } else {
            return $this->returnMessage('This subject already exists!', 'error');
        }

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
    public function edit(Subject $Subject)
    {
        $Classes = Classes::all();

        $teachers = User::getTeachers();

        return view('dashbord.Subject.edit', compact('Subject', 'Classes', 'teachers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        $validate = $request->validate([
            'class_teacher_id' => 'required',
            'classes_id' => 'required',
            'total_class' => 'required|numeric',
            'subject_name' => 'required',
            'attendances_marks' => 'required|numeric',
        ], [
            'classes_id.required' => 'Select class name',
            'total_class.required' => 'Total Class is emty!',
            'total_class.numeric' => 'Enter Numeric Value Only!',
            'subject_name.required' => 'The Subject field is required!',
            'attendances_marks.required' => 'Attendances Marks Field Is Emty!',
        ]);

        $subject_insert_check = Subject::where('classes_id', $request->classes_id)->where('subject_name', $request->subject_name)->count();

        if ($subject_insert_check == 1) {
            $subject->update([
                'class_teacher_id' => $request->class_teacher_id,
                'classes_id' => $request->classes_id,
                'subject_name' => $request->subject_name,
                'subject_code' => $request->code,
                'total_class' => $request->total_class,
                'attendances_marks' => $request->attendances_marks,
            ]);

            return $this->returnMessage('Subject Updated', 'info');
        } else {
            return $this->returnMessage('Somthing with wrong', 'warning');
        }

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
