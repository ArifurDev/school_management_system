<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Dashbord\BaseController as BaseController;
use App\Models\Attendance;
use App\Models\Classes;
use App\Models\User;
use Illuminate\Http\Request;

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
        return view('dashbord.Attendance.index',compact('classes','sections','groupes'));
    }

    /**
     * find_students
     */
    public function find_students(Request $request)
    {
        
        $request->validate([
            'class' => 'required',
            'session' => 'required',
            'group' => 'required'
        ]);
        $students =  User::where('student_status','running')
                            ->where('class_id',$request->class)
                            ->where('section',$request->session)
                            ->where('group', $request->group)
                            ->get();

        if (!empty($students)) {
            return view('dashbord.Attendance.create',compact('students'));
        }else{
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Attendance $attendance)
    {
        //
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
