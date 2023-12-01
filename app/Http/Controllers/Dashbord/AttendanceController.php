<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Dashbord\BaseController as BaseController;
use App\Models\Attendance;
use App\Models\Classes;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AttendanceController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $classes = Classes::all();
        $sections = User::where('student_status', 'running')->groupBy('section')->pluck('section');
        $groupes = User::where('student_status', 'running')->groupBy('group')->pluck('group');

        $attendances = Attendance::groupBy('user_id', 'subject_id', 'date', 'class_id')
            ->select('user_id', 'subject_id', 'date', 'class_id')
            ->get();

        return view('dashbord.Attendance.index', compact('classes', 'sections', 'groupes', 'attendances'));
    }

    /**
     * find_students
     */
    public function find_students(Request $request)
    {
        $request->validate([
            'class' => 'required',
            'session' => 'required',
            'group' => 'required',
        ]);
        $students = User::where('student_status', 'running')->where('class_id', $request->class)->where('section', $request->session)->where('group', $request->group)->get();
        if ($students) {
            $subjects = Subject::where('classes_id', $request->class)->get();

            return view('dashbord.Attendance.create', compact('students', 'subjects'));
        } else {
            return $this->returnMessage(' No matching students found', 'warning');
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'subject_id' => 'required',
            'studentId' => 'required|array', // Ensure studentId is an array
        ]);

        $attendance = Attendance::where('date', $request->date)->where('subject_id', $request->subject_id)->first();

        if (! $attendance) {
            foreach ($request->studentId as $studentId) {
                $data[] = [
                    'student_id' => $studentId,
                    'user_id' => Auth::user()->id,
                    'subject_id' => $request->subject_id,
                    'attendances' => $request->attendances[$studentId],
                    'date' => $request->date,
                    'class_id' => $request->class,
                ];
            }
            DB::table('attendances')->insert($data);
            $notification = [
                'message' => 'Attendances inserted successfully',
                'alert-type' => 'success',
            ];

            return redirect('attendance')->with($notification);

        } else {
            $notification = [
                'message' => 'Attendance already inserted for this date and subject',
                'alert-type' => 'warning',
            ];

            return redirect('attendance')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($class, $subject, $date)
    {
        // Assuming you want to fetch attendance data based on the provided parameters
        $attendances = Attendance::where('class_id', $class)
            ->where('subject_id', $subject)
            ->whereDate('date', $date)
            ->get();

        return $attendances;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Attendance $attendance)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        //
    }
}
