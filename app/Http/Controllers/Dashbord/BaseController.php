<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use App\Models\Subject;
use App\Models\User;

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
    protected function gradeCalculation($totalMarks, $fullMarks, $passMarks)
    {
        // Calculate percentage
        // $percentage = ($totalMarks / $fullMarks) * 100 ;
        $percentage = round(($totalMarks / $fullMarks) * 100, 2);

        if ($percentage >= 80 && $percentage <= 100) {
            return $point = ['A+', '5'];
        } elseif ($percentage >= 70 && $percentage < 79) {
            return $point = ['A', '4'];
        } elseif ($percentage >= 60 && $percentage < 69) {
            return $point = ['A-', '3.5'];
        } elseif ($percentage >= 50 && $percentage < 59) {
            return $point = ['B', '3'];
        } elseif ($percentage >= 40 && $percentage < 49) {
            return $point = ['C', '2'];
        } elseif ($percentage >= 30 && $percentage < 39) {
            return $point = ['D', '1'];
        } elseif ($percentage >= 0 && $percentage < 32) {
            return $point = ['F', '0'];
        }

    }
}
