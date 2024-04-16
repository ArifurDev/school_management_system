<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Dashbord\BaseController as BaseController;
use App\Models\Classes;
use App\Models\Student;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;

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
        if (User::hasRoleChecker('Head Teacher')) {
            // Get all subjects for head teacher
            $class = Classes::where('head_teacher_id', Auth::user()->id)->select('id')->first();
            $students = User::StudentListByUserRole($class->id);
        } elseif ([User::hasRoleChecker('admin') && User::hasRoleChecker('Demo Admin')]) {
            // Get all subjects
            $students = User::where('student_status', 'running')->latest()->get();
        } else {
            // Get only own subjects for teachers
            $students = [];
        }

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
            // $image = $request->file('image');
            // $file_name = $request->first_name.$request->phone.'.'.$image->getClientOriginalExtension();
            // $file_path = 'upload/users_image/'.$file_name;
            // Storage::disk('public')->put($file_path, $image->get());

            //image upload image
            $file_name = $request->phone.'-'.time().'.'.$request->file('image')->getClientOriginalExtension();
            $img = Image::make($request->file('image'));
            $img->save(base_path('public/upload/images/'.$file_name), 80);
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
    public function update(Request $request, User $student)
    {
        $request->validate([
            'full_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$student->id,
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

        $student->update([
            'name' => $request->full_name,
            'email' => $request->email,
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
        ]);

        //image check and upload
        if ($request->hasFile('image')) {
            //product image validation if set image
            $request->validate([
                'image' => 'mimes:jpg,png,jpeg,gif',
            ]);

            //delete old image from folder
            unlink(base_path('public/upload/images/'.$student->image));

            //customer image update
            $file_name = $request->phone.'-'.time().'.'.$request->file('image')->getClientOriginalExtension();
            $img = Image::make($request->file('image'));
            $img->save(base_path('public/upload/images/'.$file_name), 80);

            $student->update([
                'image' => $file_name,
            ]);
        }

        return $this->returnMessage('Account Update successfulliy', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $student)
    {
        return $this->returnMessage('Somthing with wrong', 'warning');
    }
}
