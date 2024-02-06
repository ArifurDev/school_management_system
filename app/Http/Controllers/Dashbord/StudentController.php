<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Dashbord\BaseController as BaseController;
use App\Models\Classes;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class StudentController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role_or_permission:Student access|Student create|Student edit|Student delete', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Student create', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Student edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Student delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = User::where('student_status', 'running')->latest()->get();

        return view('dashbord.student.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $Classes = Classes::all();

        return view('dashbord.student.create', compact('Classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users',
            'image' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'gender' => 'required',
            'date_of_birth' => 'required',
            'blood' => 'required',
            'father_name' => 'required',
            'mother_name' => 'required',
            'religion' => 'required',
            'class_id' => 'required',
            'section' => 'required',
            'group' => 'required',
            'bio' => 'required',
        ]);

        //concate first name and last name
        $fullName = $request->first_name.' '.$request->last_name;

        // Check if an image was uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $file_name = $request->first_name.$request->phone.'.'.$image->getClientOriginalExtension();
            $file_path = 'upload/users_image/'.$file_name;
            Storage::disk('public')->put($file_path, $image->get());
        }

        //create a student account
        $student = User::create([
            'name' => $fullName,
            'email' => $request->email,
            'password' => bcrypt('password'),
            'student_status' => 'running',
            'image' => $file_name, // Use the $file_name variable here
            'address' => $request->address,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
            'blood' => $request->blood,
            'father_name' => $request->father_name,
            'mother_name' => $request->mother_name,
            'religion' => $request->religion,
            'class_id' => $request->class_id,
            'section' => $request->section,
            'group' => $request->group,
            'bio' => $request->bio,
            'created_at' => Carbon::now(),
        ]);
        $student->assignRole('student');

        return $this->returnMessage('Student Admission successfulliy', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $student)
    {
        $studentProfile = $this->Profile($student);

        return view('dashbord.student.show', $studentProfile);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $student)
    {
        $Classes = Classes::all();

        return view('dashbord.student.edit', compact('Classes', 'student'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $student)
    {
        return $this->returnMessage('Somthing with wrong', 'warning');
    }
}
