<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Dashbord\BaseController as BaseController;
use App\Models\Classes;
use App\Models\Exam;
use App\Models\ExamMarksRegistration;
use App\Models\ExamSchedule;
use Illuminate\Http\Request;

class ExamMarksRegistrationController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $MarksRegistrations = ExamMarksRegistration::select('class_id', 'exam_id')
            ->groupBy(['class_id', 'exam_id'])
            ->get();

        return view('dashbord.ExamMarksRegistration.index', compact('MarksRegistrations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $exams = Exam::where('status', 'Show')->latest()->get();
        $classes = Classes::all();

        return view('dashbord.ExamMarksRegistration.create', compact('exams', 'classes'));
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
            'class_id' => 'required',
        ]);

        $exam_schedule = ExamSchedule::where([
            'class_id' => $request->class_id,
            'exam_id' => $request->exam_id,
        ])->first();

        if ($exam_schedule) {

            $data = [];

            foreach ($request->studentId as $student_id) {
                foreach ($request->subjectId as $subject_id) {
                    $exam_schedule_check = ExamSchedule::where([
                        'class_id' => $request->class_id,
                        'exam_id' => $request->exam_id,
                        'subject_id' => $subject_id,
                    ])->first();

                    if (! empty($exam_schedule_check)) {
                        $data[] = [
                            'student_id' => $student_id,
                            'subject_id' => $subject_id,
                            'class_id' => $request->class_id,
                            'exam_id' => $request->exam_id,
                            'class_work' => $request->class_work[$student_id][$subject_id],
                            'home_work' => $request->class_work[$student_id][$subject_id],
                            'mark' => $request->class_work[$student_id][$subject_id],
                            'full_marks' => $exam_schedule_check->full_marks,
                            'pass_marks' => $exam_schedule_check->pass_marks,
                            'created_at' => now(),
                        ];
                    }
                }
            }

            //data check
            if ($data) {
                $insertData = ExamMarksRegistration::insert($data);
            } else {
                return $this->returnMessage('You have alrady Registration Marks', 'error');
            }

            //data insert message
            if ($insertData) {
                return $this->returnMessage('Registration Marks Inserted Successfully!', 'success');
            } else {
                return $this->returnMessage('Somthing went wrong!', 'error');
            }
        } else {
            return $this->returnMessage('Exam Schedule not found for the specified Class and Exam ID', 'error');
        }
    }

    /**
     * Display the specified resource.
     */
    public function shows($exam_id, $class_id)
    {
        $MarksRegistrations = ExamMarksRegistration::where('exam_id', $exam_id)->where('class_id', $class_id)
            ->select('student_id', 'exam_id')
            ->groupBy(['student_id', 'exam_id'])
            ->get();

        return view('dashbord.ExamMarksRegistration.show', compact('MarksRegistrations'));
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

    //show  result with student id and exam id
    public function result_show($student_id, $exam_id)
    {
        $MarksRegistrations = ExamMarksRegistration::where('exam_id', $exam_id)->where('student_id', $student_id)->get();

        return view('dashbord.ExamMarksRegistration.result', compact('MarksRegistrations'));
    }
}
