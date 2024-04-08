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
    public function __construct()
    {
        $this->middleware('role_or_permission:Attendance access|Attendance create|Attendance edit|Attendance delete', ['only' => ['index', 'shows']]);
        $this->middleware('role_or_permission:Attendance create', ['only' => ['find_students', 'store']]);
        $this->middleware('role_or_permission:Attendance edit', ['only' => ['edites', 'update']]);
        $this->middleware('role_or_permission:Attendance delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (User::hasRoleChecker('Head Teacher')) {
            $class = Classes::where('head_teacher_id', Auth::user()->id)->first();
            $classes = Classes::where('head_teacher_id', Auth::user()->id)->get();

            $attendances = Attendance::where('class_id', $class->id)->groupBy('user_id', 'subject_id', 'date', 'class_id')
                ->select('user_id', 'subject_id', 'date', 'class_id')
                ->get();

        } elseif (User::hasRoleChecker('admin')) {
            $classes = Classes::all();

            $attendances = Attendance::groupBy('user_id', 'subject_id', 'date', 'class_id')
                ->select('user_id', 'subject_id', 'date', 'class_id')
                ->get();
        } elseif (User::hasRoleChecker('Teacher')) {

            $subjects = Subject::where('class_teacher_id', Auth::user()->id)->get();

            $classes = [];
            foreach ($subjects as $subject) {
                $classes[] = Classes::where('id', $subject->classes_id)->first();
            }

            // Fetch attendance records for the subjects
            $attendances = Attendance::whereIn('subject_id', $subjects->pluck('id'))
                ->groupBy('user_id', 'subject_id', 'date', 'class_id')
                ->select('user_id', 'subject_id', 'date', 'class_id')
                ->get();
        } else {
            $classes = [];
        }

        $sections = User::where('student_status', 'running')->groupBy('section')->pluck('section');
        $groupes = User::where('student_status', 'running')->groupBy('group')->pluck('group');

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
        //
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

        return view('dashbord.Attendance.show', compact('attendances'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($class, $subject, $date)
    {
        $subjects = Subject::where('classes_id', $class)->get();

        $attendances = Attendance::where('class_id', $class)
            ->where('subject_id', $subject)
            ->whereDate('date', $date)
            ->get();

        $date_subject = Attendance::where('class_id', $class)
            ->where('subject_id', $subject)
            ->whereDate('date', $date)
            ->first(); //get date and subject id

        return view('dashbord.Attendance.edit', compact('attendances', 'subjects', 'date_subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        foreach ($request->studentId as $id) {
            $data = [
                'attendances' => $request->attendances[$id],
            ];
            $Att = Attendance::where(['date' => $request->date, 'student_id' => $id, 'class_id' => $request->class, 'subject_id' => $request->subject_id])->first();
            $Att->update($data);
        }

        if ($Att) {
            return $this->returnMessage('Attendances Updated', 'success');
        } else {
            return $this->returnMessage('Somthing with wrong', 'warning');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();

        return $this->returnMessage('Attendance deleted', 'info');
    }
}
