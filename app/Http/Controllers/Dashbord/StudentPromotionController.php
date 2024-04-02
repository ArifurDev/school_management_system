<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Dashbord\BaseController as BaseController;
use App\Models\Classes;
use App\Models\StudentPromotion;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentPromotionController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role_or_permission:StudentPromotion access|StudentPromotion create|StudentPromotion edit|StudentPromotion delete', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:StudentPromotion create', ['only' => ['find_promotion_students', 'store']]);
        $this->middleware('role_or_permission:StudentPromotion edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:StudentPromotion delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (User::hasRoleChecker('Head Teacher')) {
            // Get all subjects for head teacher
            $classes = Classes::where('head_teacher_id', Auth::user()->id)->get();
        } elseif (User::hasRoleChecker('admin')) {
            // Get all subjects
            $classes = Classes::all();
        } else {
            // Get only own subjects for teachers
            $classes = [];
        }

        $sections = User::where('student_status', 'running')->groupBy('section')->pluck('section');
        $groupes = User::where('student_status', 'running')->groupBy('group')->pluck('group');

        return view('dashbord.SudentPromotion.index', compact('classes', 'sections', 'groupes'));
    }

    public function find_promotion_students(Request $request)
    {
        $request->validate([
            'class' => 'required',
            'session' => 'required',
            'group' => 'required',
        ]);
        $students = User::where('student_status', 'running')->where('class_id', $request->class)->where('section', $request->session)->where('group', $request->group)->get();
        if ($students) {
            $classes = Classes::all();

            return view('dashbord.SudentPromotion.create', compact('students', 'classes'));
        } else {
            return $this->returnMessage(' No matching students found', 'warning');
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
        $request->validate([
            'section' => 'required',
            'class' => 'required',
        ]);

        foreach ($request->check as $key => $value) {
            $data = [
                'class_id' => $request->class,
                'section' => $request->section,
            ];
            $promotion = User::where('id', $key)->first();
            $promotion->update($data);
        }
        if ($promotion) {
            $notification = [
                'message' => 'Student Promotion',
                'alert-type' => 'success',
            ];

            return redirect('studdentpromotion')->with($notification);
        } else {
            $notification = [
                'message' => 'Somthing with wrong',
                'alert-type' => 'warning',
            ];

            return redirect('studdentpromotion')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(StudentPromotion $studentPromotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StudentPromotion $studentPromotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StudentPromotion $studentPromotion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StudentPromotion $studentPromotion)
    {
        //
    }
}
