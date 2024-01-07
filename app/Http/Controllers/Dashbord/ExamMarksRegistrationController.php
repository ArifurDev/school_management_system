<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Dashbord\BaseController as BaseController;
use App\Models\Classes;
use App\Models\Exam;
use App\Models\ExamMarksRegistration;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class ExamMarksRegistrationController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        return view('dashbord.ExamMarksRegistration.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $exams = Exam::where('status','Show')->latest()->get();
        $classes = Classes::all();
        return view('dashbord.ExamMarksRegistration.create',compact('exams','classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $request->validate([
            'studentId' => 'required',
            'subjectId' => 'required',
            'class_work' => 'required',
            'home_work' => 'required',
            'exam' => 'required',
            'exam_id' => 'required',
            'class_id' => 'required'
       ]);

       $data = [];

       foreach ($request->studentId as $student_id) {
          foreach ($request->subjectId as $subject_id) {
                // $data[] =[
                //     'student_id' => $student_id,
                //     'subject_id' => $subject_id,
                //     'class_id'=> $request->class_id,
                //     'exam_id' => $request->exam_id,
                //     'class_work' => $request->class_work[$student_id][$subject_id],
                //     'home_work' => $request->class_work[$student_id][$subject_id],
                //     'mark' => $request->class_work[$student_id][$subject_id],
                //     'full_marks'
                //     'pass_marks'
                // ];
          }
       }
       
    }

    /**
     * Display the specified resource.
     */
    public function show(ExamMarksRegistration $exammarksregistration)
    {

        return view('dashbord.ExamMarksRegistration.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExamMarksRegistration $exammarksregistration)
    {
        return view('dashbord.ExamMarksRegistration.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExamMarksRegistration $exammarksregistration)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExamMarksRegistration $examMarksRegistration)
    {
        //
    }
}
