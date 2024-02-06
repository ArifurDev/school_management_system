<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Dashbord\BaseController as BaseController;
use App\Models\FeeCollection;
use App\Models\User;
use Illuminate\Http\Request;
use PDF;

class FeeCollectionController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role_or_permission:FeeCollection access|FeeCollection create|FeeCollection edit|FeeCollection delete', ['only' => ['index', 'show', 'downloadPdf']]);
        $this->middleware('role_or_permission:FeeCollection create', ['only' => ['create', 'store']]);
        $this->middleware('role_or_permission:FeeCollection edit', ['only' => ['edit', 'update']]);
        $this->middleware('role_or_permission:FeeCollection delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fee_collections = FeeCollection::latest()->get();

        return view('dashbord.FeeCollection.index', compact('fee_collections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($student)
    {
        $student_info = User::where('id', $student)
            ->select('id', 'name', 'email', 'phone', 'image', 'section', 'class_id')
            ->first();

        return view('dashbord.FeeCollection.create', compact('student_info'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $student)
    {
        //validation
        $validation = $request->validate([
            'expense_type' => ['required'],
            'amount' => ['required'],
            'date' => ['required'],
            'description' => ['required', 'string'],
        ]);
        $data = new FeeCollection();
        $data->user_id = $student; //user id
        $data->date = date('Y-m-d', strtotime($request->date));
        $data->expense = $request->expense_type;
        $data->amount = $request->amount;
        $data->due = $request->due;
        $data->description = $request->description;

        $data->save();

        return $this->returnMessage('Student Fee Collection Successfulliy', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show(FeeCollection $feecollection)
    {
        return view('dashbord.FeeCollection.show', compact('feecollection'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeeCollection $feecollection)
    {
        return view('dashbord.FeeCollection.edit', compact('feecollection'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FeeCollection $feecollection)
    {
        //validation
        $validation = $request->validate([
            'expense_type' => ['required'],
            'amount' => ['required'],
            'date' => ['required'],
            'description' => ['required', 'string'],
        ]);

        $data['date'] = date('Y-m-d', strtotime($request->date));
        $data['expense'] = $request->expense_type;
        $data['amount'] = $request->amount;
        $data['due'] = $request->due;
        $data['description'] = $request->description;

        $feecollection->update($data);

        return $this->returnMessage('Student Fees update', 'info');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeeCollection $feecollection)
    {
        $feecollection->delete();

        return $this->returnMessage('Student Fees Delete!', 'info');
    }

    /**
     * download pdf single id Fees details
     */
    public function downloadPdf(FeeCollection $feecollection)
    {
        $pdf = PDF::loadView('dashbord.FeeCollection.downloadPdf', compact('feecollection'));

        return $pdf->download($feecollection->User->phone.'.pdf');
    }
}
