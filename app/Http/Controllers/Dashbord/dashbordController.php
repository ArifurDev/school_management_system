<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Dashbord\BaseController as BaseController;
use App\Models\Attendance;
use App\Models\Expense;
use App\Models\FeeCollection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class dashbordController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role_or_permission:Dashbord access|Dashbord create|Dashbord edit|Dashbord delete', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Dashbord create', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Dashbord edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Dashbord delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $today_date = date('Y-m-d');

        $data = [
            'teachers' => User::where('student_status', '0')->whereHas('roles', fn ($query) => $query->where('name', 'Teacher'))->count(),
            'students' => User::where('student_status', 'running')->whereHas('roles', fn ($query) => $query->where('name', 'Student'))->count(),

            'today_present' => Attendance::where('attendances', 'Present')->whereDate('date', $today_date)->count(),
            'today_absent' => Attendance::where('attendances', 'Absent')->whereDate('date', $today_date)->count(),

            'today_expens' => Expense::whereDate('created_at', $today_date)->sum('amount'),
            'today_expens_due' => Expense::whereDate('created_at', $today_date)->sum('due'),

            'today_feeCollection' => FeeCollection::whereDate('created_at', $today_date)->sum('amount'),
            'today_feeCollection_due' => FeeCollection::whereDate('created_at', $today_date)->sum('due'),
        ];

        //student profile
        //Auth student role check
        $student = User::where('id', Auth::id())->whereHas('roles', function ($query) {
            $query->where('name', 'student');
        })->exists(); // Check if any user with the given ID has the student role

        if ($student) {
            $authProfile = $this->Profile(Auth::user());

            return view('dashbord.AuthProfile.profile', $authProfile);
        }

        return view('dashbord.maniDashbord', $data);
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
