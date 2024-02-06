<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Dashbord\BaseController as BaseController;
use App\Models\Salarysheet;
use App\Models\User;
use Illuminate\Http\Request;

class SalarysheetController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role_or_permission:Salarysheet access|Salarysheet create|Salarysheet edit|Salarysheet delete', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Salarysheet create', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Salarysheet edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Salarysheet delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $salarysheets = Salarysheet::all();

        return view('dashbord.salarysheets.index', compact('salarysheets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $teachers = User::where('student_status', '0')
            ->whereHas('roles', function ($query) {
                $query->where('name', 'Teacher');
            })
            ->get();

        // $teachers = User::where('student_status', '0')->get();
        return view('dashbord.salarysheets.create', compact('teachers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'user_id' => 'required|numeric',
            'amount' => 'required',
        ]);

        $salarysheet = Salarysheet::where('user_id', $request->user_id)->first();

        if (! $salarysheet) {
            Salarysheet::create($validation);

            return $this->returnMessage('Salary Sheet Create Successfulliy', 'success');
        } else {
            return $this->returnMessage('This Teacher already exists', 'error');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Salarysheet $salarysheet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salarysheet $salarysheet)
    {
        return view('dashbord.salarysheets.edit', compact('salarysheet'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salarysheet $salarysheet)
    {
        $validation = $request->validate([
            'amount' => 'required',
        ]);
        $salarysheet->update($validation);

        return $this->returnMessage('Salary Sheet Updated', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salarysheet $salarysheet)
    {
        $salarysheet->delete();

        return $this->returnMessage('Salary Sheet Delete', 'warning');
    }
}
