<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Dashbord\BaseController as BaseController;
use App\Models\Classes;
use App\Models\Exam;
use App\Models\ExamSchedule;
use App\Models\Subject;
use Illuminate\Http\Request;

class ExamScheduleController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role_or_permission:ExamSchedule access|ExamSchedule create|ExamSchedule edit|ExamSchedule delete', ['only' => ['index', 'shows']]);
        $this->middleware('role_or_permission:ExamSchedule create', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:ExamSchedule edit', ['only' => ['edites', 'update']]);
        $this->middleware('role_or_permission:ExamSchedule delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $examSchedules = ExamSchedule::groupBy('exam_id', 'class_id')
            ->select('exam_id', 'class_id')
            ->get();

        return view('dashbord.ExamSchedule.index', compact('examSchedules'));
    }

    //get subjects based on the selected class
    public function getSubjects($class)
    {
        try {
            $subjects = Subject::where('classes_id', $class)->get();

            return response()->json($subjects);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error fetching subjects'], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $exams = Exam::where('status', 'Show')->latest()->get();
        $classes = Classes::all();

        // $subjectes = Subject::latest()->get();
        return view('dashbord.ExamSchedule.create', compact('exams', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subjectId' => 'required',
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'room_number' => 'required',
            'full_marks' => 'required',
            'pass_marks' => 'required',
            'exam_id' => 'required|numeric',
            'class_id' => 'required|numeric',
        ],
            [
                'class_id.required' => 'Please Select an Class!',
                'exam_id.required' => 'Please Select an exam!',
                'start_time.required' => 'Start Time is Empty! Please Input Start Time',
                'end_time.required' => 'End Time is Empty! Please Input End Time',
                'room_number.required' => 'Room Number is Empty! Please Input Room Number',
                'full_marks.required' => 'Full Marks is Empty! Please Input Full Marks',
                'pass_marks.required' => 'Pass Marks is Empty! Please Input Pass Marks',
                'subjectId.required' => 'Subject is Empty!',
                'date' => 'Please Select an Date',
            ]
        );

        $subject_id = $request->subjectId[0];
        $class_id = $request->class_id;

        $subject_check = Subject::where('id', $subject_id)->where('classes_id', $class_id)->first();

        if ($subject_check) {

            $data = [];
            foreach ($request->subjectId as $subjectId) {
                $exam_schedule_check = ExamSchedule::where('subject_id', $subjectId)->where('exam_id', $request->exam_id)->where('class_id', $request->class_id)->first();
                if (! $exam_schedule_check) {
                    $data[] = [
                        'subject_id' => $subjectId,
                        'exam_id' => $request->exam_id,
                        'class_id' => $request->class_id,
                        'exam_date' => $request->date[$subjectId],
                        'start_time' => $request->start_time[$subjectId],
                        'end_time' => $request->end_time[$subjectId],
                        'room_number' => $request->room_number[$subjectId],
                        'full_marks' => $request->full_marks[$subjectId],
                        'pass_marks' => $request->pass_marks[$subjectId],
                    ];
                }
            }
            if ($data) {
                $insertData = ExamSchedule::insert($data);
            } else {
                return $this->returnMessage('You have alrady add Exam Schedule', 'error');
            }

            if ($insertData) {
                return $this->returnMessage('Exam Schedule Inserted Successfully!', 'success');
            } else {
                return $this->returnMessage('Somthing went wrong!', 'error');
            }

        } else {
            return $this->returnMessage('Somthing with wrong', 'warning');
        }
    }

    /**
     * Display the specified resource.
     */
    public function shows($exam_id, $class_id)
    {
        $examSchedules = ExamSchedule::where('exam_id', $exam_id)->where('class_id', $class_id)->get();

        return view('dashbord.ExamSchedule.show', compact('examSchedules'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edites(ExamSchedule $ExamSchedule)
    {
        $exams = Exam::where('status', 'Show')->latest()->get();

        return view('dashbord.ExamSchedule.edit', compact('ExamSchedule', 'exams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ExamSchedule $examsschedule)
    {
        $request->validate([
            'date' => 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'room_number' => 'required',
            'full_marks' => 'required',
            'pass_marks' => 'required',
            'exam_id' => 'required|numeric',
        ]);

        $data = [
            'exam_id' => $request->exam_id,
            'exam_date' => $request->date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'room_number' => $request->room_number,
            'full_marks' => $request->full_marks,
            'pass_marks' => $request->pass_marks,
        ];

        $examsschedule->update($data);

        return $this->returnMessage('Exam Schedule Update successfully', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ExamSchedule $examsschedule)
    {
        $examsschedule->delete();

        return $this->returnMessage('Exam Schedule deleted!', 'info');
    }
}
