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
}
