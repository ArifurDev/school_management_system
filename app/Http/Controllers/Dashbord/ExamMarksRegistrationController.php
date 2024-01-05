<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Dashbord\BaseController as BaseController;
use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Exam;
use App\Models\ExamMarksRegistration;
use Illuminate\Http\Request;

class ExamMarksRegistrationController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $marks_registrations = ExamMarksRegistration::groupBy('exam_id', 'class_id')
                                                    ->select('exam_id', 'class_id')
                                                    ->get();
        return view('dashbord.ExamMarksRegistration.index',compact('marks_registrations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $exams = Exam::where('status', 'Show')->latest()->get();
        $classes = Classes::all();
        return view('dashbord.ExamMarksRegistration.create',compact('exams','classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "class_id"      => "required",
            "exam_id"       => "required",
            "subjectId"     => "required",
            "class_work"    => "required",
            "home_work"     => "required",
            "exam"          => "required"
        ],[
            "class_id.required"     => "Please Select an Class!",
            "exam_id.required"      => "Please Select an exam!",
            "class_work.required"   => "Class Work is Empty! Please Input Class Work Marks",
            "home_work.required"    => "Home Work is Empty! Please Input Home Work Marks",
            "exam.required"         => "Exam Marks are Empty! Please Input Exam",
            "subjectId.required"    => "Subject is Empty!"
        ]
    );
        

        $data = [];
        foreach ($request->subjectId as $subject_id) {
           $marks_registration_check = ExamMarksRegistration::where('subject_id',$subject_id)->where('exam_id',$request->exam_id)->where('class_id',$request->class_id)->first();
            if (!$marks_registration_check) {
                $data[] = [
                    'subject_id' => $subject_id,
                    'class_id' => $request->class_id,
                    'exam_id' => $request->exam_id,
                    'class_work' => $request->class_work[$subject_id],
                    'home_work' => $request->home_work[$subject_id],
                    'exam' => $request->exam[$subject_id],
                ];
            }
        }
        if ($data) {
            $insertData = ExamMarksRegistration::insert($data);
        } else {
            return $this->returnMessage('You have alrady add subjects','error');
        }

        if ($insertData) {
             return $this->returnMessage('Exam Marks Registration Inserted Successfully!', 'success');
        } else {
             return $this->returnMessage('Somthing went wrong!', 'error');
        }

    }

    /**
     * Display the specified resource.
     */
    public function shows($exam_id, $class_id)
    {
        $ExamMarksRegistrations = ExamMarksRegistration::where('exam_id', $exam_id)->where('class_id', $class_id)->get();
        return view('dashbord.ExamMarksRegistration.show',compact('ExamMarksRegistrations'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ExamMarksRegistration $exammarksregistration)
    {
        $exams = Exam::where('status', 'Show')->latest()->get();
        return view('dashbord.ExamMarksRegistration.edit',compact('exammarksregistration','exams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExamMarksRegistration $exammarksregistration)
    {
        $request->validate([
            "exam_id"    => "required",
            "class_work" => "required",
            "home_work"  => "required",
            "exam"       => "required"
        ],[
            "exam_id.required"    => "Please Select an exam!",
            "class_work.required" => "Class Work is Empty! Please Input Class Work Marks",
            "home_work.required"  => "Home Work is Empty! Please Input Home Work Marks",
            "exam.required"       => "Exam Marks are Empty! Please Input Exam"
        ]);
        //Update Data
        $updateData = $exammarksregistration->update([
            "exam_id" => $request->exam_id,
            "class_work" => $request->class_work,
            "home_work" => $request->home_work,
            "exam" => $request->exam,
        ]);

        if ($updateData) {
            return $this->returnMessage('Exam Marks  Updated Successfully!', 'success');
        } else {
            return $this->returnMessage('Something Went Wrong!', 'error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExamMarksRegistration $examMarksRegistration)
    {
        //
    }
}
