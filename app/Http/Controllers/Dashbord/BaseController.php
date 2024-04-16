<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\ExamMarksRegistration;
use App\Models\ExamSchedule;
use App\Models\FeeCollection;
use App\Models\Subject;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class BaseController extends Controller
{
    public function returnMessage($message, $type)
    {
        $notification = [
            'message' => $message,
            'alert-type' => $type,
        ];

        return redirect()->back()->with($notification);
    }

    //get data
    public function getData($class)
    {
        $subjects = Subject::where('classes_id', $class)->latest()->get();
        $students = User::where('student_status', 'running')->where('class_id', $class)->latest()->get();

        return response()->json(['subjects' => $subjects, 'students' => $students]);
    }

    //get Attendanceh marks
    public function attendanceMarks($subjectId, $studentId)
    {
        $subject = Subject::find($subjectId);
        $attendanceMark = $subject->attendances_marks / $subject->total_class;
        $roundedAttendanceMark = round($attendanceMark, 2); //0.00
        $countAttendance = Attendance::where([['student_id', $studentId], ['subject_id', $subjectId], ['attendances', 'Present']])->count();

        return $roundedAttendanceMark * $countAttendance;
    }

    //Grade Calculator
    protected function gradeCalculation($percentage)
    {
        $grade = '';
        $point = '';

        switch (true) {
            case $percentage >= 80 && $percentage <= 100:
                $grade = 'A+';
                $point = '5';
                break;
            case $percentage >= 70 && $percentage <= 79:
                $grade = 'A';
                $point = '4';
                break;
            case $percentage >= 60 && $percentage <= 69:
                $grade = 'A-';
                $point = '3.5';
                break;
            case $percentage >= 50 && $percentage <= 59:
                $grade = 'B';
                $point = '3';
                break;
            case $percentage >= 40 && $percentage <= 49:
                $grade = 'C';
                $point = '2';
                break;
            case $percentage >= 33 && $percentage <= 39:
                $grade = 'D';
                $point = '1';
                break;
            case $percentage >= 0 && $percentage < 33:
                $grade = 'F';
                $point = '0';
                break;
            default:
                // Handle the case when the percentage is out of expected range
                break;
        }

        return [$grade, $point];

    }

    //get Remarks
    public function getRemark($grade)
    {
        switch ($grade) {
            case 'A+':
                return 'Excellent';
                break;
            case 'A':
                return 'Very Good';
                break;
            case 'A-':
                return 'Good';
                break;
            case 'B':
                return 'Above Avaerage';
                break;
            case 'C':
                return 'Avaerage';
                break;
            case 'D':
                return 'Pass';
                break;
            case 'F':
                return 'Need Improvement';
                break;
            default:
                // code...
                break;
        }
    }

    // public function Profile(User $student)
    // {
    //     $presentCount = Attendance::where('student_id', $student->id)->where('attendances', 'present')->count();
    //     $lateCount = Attendance::where('student_id', $student->id)->where('attendances', 'late')->count();
    //     $apsentCount = Attendance::where('student_id', $student->id)->where('attendances', 'apsent')->count();

    //     $allPayments = FeeCollection::where('user_id', $student->id)->get();

    //     $prevDate = date('Y-m', strtotime('-1 month'));
    //     $monthlyFee = FeeCollection::where('user_id', $student->id)
    //         ->whereYear('date', date('Y', strtotime($prevDate)))
    //         ->whereMonth('date', date('m', strtotime($prevDate)))
    //         ->where('expense', 'Monthly Fee')
    //         ->first();

    //     $ExamSchedules = ExamSchedule::where(function ($query) use ($student) {
    //         $query->whereDate('exam_date', '>=', Carbon::today());
    //         $query->where('class_id', $student->class_id);
    //     })->get();

    //     //get latest exam result.
    //     $latestExam = ExamMarksRegistration::select('exam_id')
    //         ->where('student_id', Auth::id())
    //         ->latest('exam_id')->first();

    //     if ($latestExam) {

    //         $examMarks = ExamMarksRegistration::select('student_id', 'subject_id', 'exam_id', 'total_mark', 'full_marks')
    //             ->where(['exam_id' => $latestExam->exam_id], ['student_id' => Auth::id()])
    //             ->get();

    //         //store calculated total  marks
    //         $all_subject_total_marks = 0;
    //         $all_subject_full_marks = 0;

    //         foreach ($examMarks as $examMark) {
    //             //count total gpa and Grade
    //             $all_subject_total_marks += $examMark->total_mark;
    //             $all_subject_full_marks += $examMark->full_marks;
    //         }//End Foreach Loop

    //         //Grade Calculator
    //         $GradePercentage = round(($all_subject_total_marks / $all_subject_full_marks) * 100, 2);
    //          $Grade_Calculator = $this->gradeCalculation($GradePercentage);
    //     }

    //     return [
    //         $student, $monthlyFee, $allPayments, $presentCount, $lateCount, $apsentCount, $ExamSchedules, $Grade_Calculator,
    //     ];
    //     die();

    //     return compact('student', 'monthlyFee', 'allPayments', 'presentCount', 'lateCount', 'apsentCount', 'ExamSchedules', 'Grade_Calculator');
    // }

    public function Profile(User $student)
    {
        $presentCount = Attendance::where('student_id', $student->id)->where('attendances', 'present')->count();
        $lateCount = Attendance::where('student_id', $student->id)->where('attendances', 'late')->count();
        $apsentCount = Attendance::where('student_id', $student->id)->where('attendances', 'apsent')->count();

        $allPayments = FeeCollection::where('user_id', $student->id)->get();

        $prevDate = date('Y-m', strtotime('-1 month'));
        $monthlyFee = FeeCollection::where('user_id', $student->id)
            ->whereYear('date', date('Y', strtotime($prevDate)))
            ->whereMonth('date', date('m', strtotime($prevDate)))
            ->where('expense', 'Monthly Fee')
            ->first();

        $ExamSchedules = ExamSchedule::where(function ($query) use ($student) {
            $query->whereDate('exam_date', '>=', Carbon::today());
            $query->where('class_id', $student->class_id);
        })->get();

        // Initialize Grade_Calculator
        $Grade_Calculator = null;

        //get latest exam result.
        $latestExam = ExamMarksRegistration::select('exam_id')
            ->where('student_id', Auth::id())
            ->latest('exam_id')->first();

        if ($latestExam) {

            $examMarks = ExamMarksRegistration::select('student_id', 'subject_id', 'exam_id', 'total_mark', 'full_marks')
                ->where(['exam_id' => $latestExam->exam_id], ['student_id' => Auth::id()])
                ->get();

            //store calculated total  marks
            $all_subject_total_marks = 0;
            $all_subject_full_marks = 0;

            foreach ($examMarks as $examMark) {
                //count total gpa and Grade
                $all_subject_total_marks += $examMark->total_mark;
                $all_subject_full_marks += $examMark->full_marks;
            }//End Foreach Loop

            //Grade Calculator
            $GradePercentage = round(($all_subject_total_marks / $all_subject_full_marks) * 100, 2);
            $Grade_Calculator = $this->gradeCalculation($GradePercentage);
        }

        return compact('student', 'monthlyFee', 'allPayments', 'presentCount', 'lateCount', 'apsentCount', 'ExamSchedules', 'Grade_Calculator');
    }
}
