<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Dashbord\BaseController as BaseController;
use App\Models\Exam;
use App\Models\ExamSchedule;
use Illuminate\Http\Request;

class ExamController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role_or_permission:Exam access|Exam create|Exam edit|Exam delete', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Exam create', ['only' => ['index', 'store']]);
        $this->middleware('role_or_permission:Exam edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Exam delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $exams = Exam::latest()->get();

        return view('dashbord.Exam.index', compact('exams'));
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
        $rules = [
            'exam' => ['required', 'unique:exams'],
            'status' => ['required'],
        ];
        $this->validate($request, $rules);
        $data = $request->all();
        Exam::create($data);

        return $this->returnMessage('Exam Create', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Exam $exam)
    {
        return view('dashbord.Exam.edit', compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Exam $exam)
    {
        $validation = $request->validate([
            'exam' => 'unique:exams,exam,'.$exam->id,
            'status' => 'required',
        ]);
        $exam->update($validation);

        return $this->returnMessage('Exam Updated Successfully', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Exam $exam)
    {
        $examSchedule_check = ExamSchedule::where('exam_id', $exam->id)->first();
        if ($examSchedule_check) {
            return $this->returnMessage('This exam has related schedule , So You can not delete it now !', 'warning');
        } else {
            $exam->delete();

            return $this->returnMessage('Deleted Successfully', 'info');
        }
    }
}
