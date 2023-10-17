<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Student;
use App\Models\User;
use App\Models\UserInfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $student = User::where('student_status', 'running')->get();

        return $student;
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
            'phone' => 'required|min:11|max:12',
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

        //create a student account
        $student = User::create([
            'name' => $fullName,
            'email' => $request->email,
            'password' => bcrypt('password'),
            'student_status' => 'running',
            'created_at' => Carbon::now(),
        ]);
        $student->assignRole('student');

        // Check if an image was uploaded

        $image = $request->file('image');
        $file_name = $student->id.'.'.$image->getClientOriginalExtension();
        $file_path = 'upload/users_image/'.$file_name;
        Storage::disk('public')->put($file_path, $image->get());

        // Create the student information
        UserInfo::create([
            'user_id' => $student->id,
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

        $notification = [
            'message' => 'Student Admission successfully',
            'alert-type' => 'success',
        ];

        return redirect()->back()->with($notification);

    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        //
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
    public function destroy(Student $student)
    {
        //
    }
}
