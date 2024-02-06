<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Dashbord\BaseController as BaseController;
use App\Models\Expense;
use Illuminate\Http\Request;
use PDF;

class ExpenseController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role_or_permission:Expense access|Expense create|Expense edit|Expense delete', ['only' => ['index', 'show', 'downloadPdf']]);
        $this->middleware('role_or_permission:Expense create', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:Expense edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:Expense delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::latest()->get();

        return view('dashbord.Expense.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashbord.Expense.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'name' => ['required'],
            'phone' => ['required', 'min:11', 'max:11'],
            'amount' => ['required', 'numeric'],
            'expense_type' => ['required'],
            'date' => ['required'],
            'status' => ['required'],
            'description' => ['required'],
        ]);

        $data = new Expense(); //create object

        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['amount'] = $request->amount;
        $data['date'] = date('Y-m-d', strtotime($request->date));
        $data['expens_type'] = $request->expense_type;
        $data['status'] = $request->status;
        $data['description'] = $request->description;

        //check
        if ($request->status != 'paid') {
            if ($request->status == 'due' && $request->due != null) {
                $data['due'] = $request->due;
            } else {
                return $this->returnMessage('Somthing with wrong due status or due amount! pleace check then submit', 'warning');
            }
        }

        //save all data in Database
        $data->save();

        return $this->returnMessage('Expense Submit Successfulliy', 'success');

    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        return view('dashbord.Expense.show', compact('expense'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Expense $expense)
    {
        return view('dashbord.Expense.edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        //validation
        $request->validate([
            'name' => ['required'],
            'phone' => ['required', 'min:11', 'max:11'],
            'amount' => ['required', 'numeric'],
            'expense_type' => ['required'],
            'date' => ['required'],
            'status' => ['required'],
            'description' => ['required'],
        ]);

        $data['name'] = $request->name;
        $data['phone'] = $request->phone;
        $data['amount'] = $request->amount;
        $data['date'] = date('Y-m-d', strtotime($request->date));
        $data['expens_type'] = $request->expense_type;
        $data['status'] = $request->status;
        $data['description'] = $request->description;

        //check
        if ($request->status != 'paid') {
            if ($request->status == 'due' && $request->due != null) {
                $data['due'] = $request->due;
            } else {
                return $this->returnMessage('Somthing with wrong due status or due amount! pleace check then submit', 'warning');
            }
        } else {
            $data['due'] = $request->due;
        }

        //save all data in Database
        $expense->update($data);

        return $this->returnMessage('Expense Submit Successfulliy', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();

        return $this->returnMessage('Expense Deleted', 'info');
    }

    /**
     * Single Expens page download pdf
     */
    public function downloadPdf(Expense $expense)
    {
        $pdf = PDF::loadView('dashbord.Expense.singlePdf', compact('expense'));

        return $pdf->download('Expense.pdf');
    }
}
