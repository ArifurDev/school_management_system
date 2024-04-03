<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Dashbord\BaseController as BaseController;
use App\Models\Classes;
use App\Models\Exam;
use App\Models\ExamMarksRegistration;
use App\Models\ExamSchedule;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;

class ExamMarksRegistrationController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role_or_permission:ExamMarks access|ExamMarks create|ExamMarks edit|ExamMarks delete|Exam result', ['only' => ['index', 'shows']]);
        $this->middleware('role_or_permission:ExamMarks create', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:ExamMarks edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:ExamMarks delete', ['only' => ['destroy']]);
        $this->middleware('role_or_permission:Exam result', ['only' => ['result_show', 'markSheetGenerate']]);
    }

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

        $subjects_id = array_unique($request->input('subjectId')); //push unique subject id into the array

        $exam_schedule = ExamSchedule::where(['class_id' => $request->class_id, 'exam_id' => $request->exam_id])->first();

        if ($exam_schedule) {

            $data = [];

            foreach ($request->studentId as $student_id) {
                foreach ($subjects_id as $subject_id) {
                    $exam_schedule_check = ExamSchedule::where(['class_id' => $request->class_id, 'exam_id' => $request->exam_id, 'subject_id' => $subject_id])->first();
                    //get Attendanceh Marks
                    $AttendancehMarks = $this->attendanceMarks($subject_id, $student_id);

                    $fullMarks = $exam_schedule_check->full_marks;
                    $passMarks = $exam_schedule_check->pass_marks;

                    // classWork + homeWork + examMarks + AttendancehMarks
                    $total_marks = $request->class_work[$student_id][$subject_id] + $request->home_work[$student_id][$subject_id] + $request->exam[$student_id][$subject_id] + $AttendancehMarks;

                    if (! empty($exam_schedule_check)) {
                        if (! ($total_marks > $fullMarks)) {
                            $data[] = [
                                'student_id' => $student_id,
                                'subject_id' => $subject_id,
                                'class_id' => $request->class_id,
                                'exam_id' => $request->exam_id,
                                'class_work' => $request->class_work[$student_id][$subject_id],
                                'home_work' => $request->home_work[$student_id][$subject_id],
                                'mark' => $request->exam[$student_id][$subject_id],
                                'attendance_mark' => $AttendancehMarks,
                                'total_mark' => $total_marks,
                                'full_marks' => $fullMarks,
                                'pass_marks' => $passMarks,
                                'created_at' => now(),
                            ];
                        }
                    }
                }
            }

            //data check
            if ($data) {
                $insertData = ExamMarksRegistration::insert($data);
            } else {
                return $this->returnMessage('You have alrady Registration Marks', 'error');
            }

            // data insert message
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
        return view('dashbord.ExamMarksRegistration.edit', compact('exammarksregistration'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExamMarksRegistration $exammarksregistration)
    {
        // validation
        $request->validate([
            'home_work' => ['required'],
            'class_work' => ['required'],
            'mark' => ['required'],
        ]);

        //get some data
        $fullMark = $exammarksregistration->full_marks;
        $attendance_mark = $exammarksregistration->attendance_mark;

        $total_marks = $request->class_work + $request->home_work + $request->mark + $attendance_mark;

        if (! ($total_marks > $fullMark)) {
            $exammarksregistration->update([
                'class_work' => $request->class_work,
                'home_work' => $request->home_work,
                'mark' => $request->mark,
                'total_mark' => $total_marks,
            ]);

            return $this->returnMessage('Exam Marks update Successfully!', 'success');
        } else {
            return $this->returnMessage('Total Marks is greater than Full Marks!', 'error');
        }
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
        $MarksRegistrations = ExamMarksRegistration::where('exam_id', $exam_id)->where('student_id', $student_id)->select('id', 'exam_id', 'subject_id', 'class_work', 'home_work', 'mark', 'attendance_mark', 'total_mark', 'full_marks', 'pass_marks')->get();
        $studentInfo = ExamMarksRegistration::where('exam_id', $exam_id)->where('student_id', $student_id)->select('id', 'exam_id', 'student_id', 'class_id')->first();

        return view('dashbord.ExamMarksRegistration.result', compact('MarksRegistrations', 'studentInfo'));
    }

    //marksheet Generator
    public function markSheetGenerate($student_id, $student_slug, $exam_id, $exam_slug, $class_id, $class_slug)
    {

        $student = User::find($student_id)->where('name', $student_slug)->first();
        $class = Classes::find($class_id)->where('class_name', $class_slug)->first();
        $exam = Exam::find($exam_id)->where('exam', $exam_slug)->first();

        if ($student && $class && $exam) {

            $examMarks = ExamMarksRegistration::where('student_id', $student_id)
                ->where('class_id', $class_id)
                ->where('exam_id', $exam_id)
                ->get();
            if ($examMarks) {

                //store calculated total  marks
                $all_subject_total_marks = 0;
                $all_subject_full_marks = 0;

                foreach ($examMarks as $examMark) {

                    $totalMarks = $examMark->total_mark;
                    $fullMarks = $examMark->full_marks;
                    $passMarks = $examMark->pass_marks;

                    //Grade Calculator
                    $GradePercentage = round(($totalMarks / $fullMarks) * 100, 2);
                    $Grade_Calculator = $this->gradeCalculation($GradePercentage);

                    //count total gap and Grade
                    $all_subject_total_marks += $examMark->total_mark;
                    $all_subject_full_marks += $examMark->full_marks;

                    $MarkSheet[] = [
                        'subject_id' => $examMark->subject_id,
                        'subject_name' => $examMark->subject->subject_name,
                        'subject_code' => $examMark->subject->subject_code,
                        'total_marks' => $examMark->subject_id,
                        'Grade' => $Grade_Calculator[0],
                        'gpa' => $Grade_Calculator[1],
                    ];

                }

                //calculate Average Grade and point
                $totalPercentage = ($all_subject_total_marks / $all_subject_full_marks) * 100;
                $Avarage_Grade_point_calculator = $this->gradeCalculation($totalPercentage);

                //get Remarks
                $Remarks = $this->getRemark($Avarage_Grade_point_calculator[0]);

                return view('dashbord.ExamMarksRegistration.markSheet', compact('student', 'exam', 'class', 'MarkSheet', 'Avarage_Grade_point_calculator', 'Remarks', 'totalPercentage'));
            }
        } else {
            abort(404); // Or redirect to an error page
        }

    }
}
