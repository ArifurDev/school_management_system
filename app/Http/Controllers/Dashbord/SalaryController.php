<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Dashbord\BaseController as BaseController;
use App\Models\Salary;
use App\Models\Salarysheet;
use App\Models\User;
use Illuminate\Http\Request;

class SalaryController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role_or_permission:Salary access|Salary create|Salary edit|Salary delete', ['only' => ['index', 'show']]);
        $this->middleware('role_or_permission:Salary create', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Salary edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Salary delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prev_full_date = date('Y-m', strtotime('-1 month'));

        $salarySheets = Salarysheet::all();

        return view('dashbord.Salary.index', compact('salarySheets', 'prev_full_date'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($user_id)
    {
        $user = User::where('id', $user_id)->first();
        $prev_full_date = date('Y-m', strtotime('-1 month'));
        $prev_advanch_check = Salary::where('user_id', $user_id)->where('status', '2')->where('date', $prev_full_date)->first();

        $salaries = Salary::where('user_id', $user_id)->latest()->get();

        return view('dashbord.Salary.create', compact('user', 'prev_full_date', 'prev_advanch_check', 'salaries'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validation
        $validation = $request->validate([
            'date' => 'required|date',
            'amount' => 'required|numeric',
            'status' => 'required|numeric',
        ]);

        /**
         * status
         * 1-->Paid
         * 2-->Advanch
         */

        // Check if the specified fields exist in the request
        if ($request->has(['date', 'amount', 'status'])) {
            // Fetch salary sheet based on user ID
            $salarySheet = Salarysheet::where('user_id', $request->id)->first();

            $prev_full_date = date('Y-m', strtotime('-1 month'));

            $date = $request->date;
            $expload = explode('-', $date);
            $year = $expload[0];
            $month = $expload[1];

            $date_formate = "$year-$month";

            if ($salarySheet) {
                $salaryAmount = $salarySheet->amount;

                $advance_salary_check = Salary::where('user_id', $request->id)->where('status', '2')->first();
                $prev_advanch_check = Salary::where('user_id', $request->id)->where('status', '2')->where('date', $prev_full_date)->first();

                if ($request->status == '1' && $request->amount == $salaryAmount && $prev_full_date == $date_formate) { //paid monthly salary
                    $prev_month_salary_check = Salary::where('user_id', $request->id)->where('date', $date_formate)->first();
                    if (! $prev_month_salary_check) {
                        $data = new Salary;
                        $data->user_id = $request->id;
                        $data->amount = $request->amount;
                        $data->status = $request->status;
                        $data->date = $date_formate;
                        $data->save();

                        return $this->returnMessage('Teacher salary payment successfulliy', 'success');
                    } else {
                        return $this->returnMessage('you have alrady pay this month salary', 'warning');
                    }
                } elseif ($request->status == '2' && $request->amount > '0' && $request->amount < $salaryAmount) { //advanch salary

                    if (! $advance_salary_check) {
                        $data = new Salary;
                        $data->user_id = $request->id;
                        $data->amount = $request->amount;
                        $data->due = $salaryAmount - $request->amount;
                        $data->status = $request->status;
                        $data->date = $date_formate;
                        $data->save();

                        return $this->returnMessage('Advanch salary payment successfulliy', 'success');
                    } else {
                        return $this->returnMessage('Advance salary alrady exit', 'warning');
                    }

                } elseif ($request->status == '1' && $prev_full_date == $date_formate && $request->amount == $prev_advanch_check->due) { //due amount pay

                    $prev_advanch_check->update([
                        'amount' => $request->amount + $prev_advanch_check->amount,
                        'due' => 0,
                        'status' => $request->status,
                    ]);

                    return $this->returnMessage('Pay due salary this month', 'info');
                } else {
                    return $this->returnMessage('somthing with wrong pleace try agin!', 'warning');
                }
            } else {
                return $this->returnMessage('Salary sheet not found for the specified user ID', 'error');
            }
        } else {
            return $this->returnMessage('One or more required fields (date, amount, status) are missing in the request.', 'warning');
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Salary $salary)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Salary $salary)
    {
        $user = User::where('id', $salary->user_id)->first();

        return view('dashbord.Salary.edit', compact('user', 'salary'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Salary $salary)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Salary $salary)
    {
        //
    }
}
