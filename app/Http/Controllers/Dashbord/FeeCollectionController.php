<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Dashbord\BaseController as BaseController;
use App\Models\FeeCollection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FeeCollectionController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fee_collections = FeeCollection::latest()->get();
        return view('dashbord.FeeCollection.index',compact('fee_collections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($student)
    {
        $student_info = User::where('id', $student)
                            ->select('name', 'email', 'phone', 'image', 'section', 'class_id')
                            ->first();
        return view('dashbord.FeeCollection.create',compact('student_info'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,$student)
    {
        //validation
        $validation = $request->validate([
            'expense_type' => ['required'],
            'amount' => ['required'],
            'date' => ['required'],
            'description' => ['required','string'],
        ]);
        $data = new FeeCollection();
        $data->user_id = $student;//user id
        $data->date = date('Y-m-d', strtotime($request->date));
        $data->expense = $request->expense_type;
        $data->amount = $request->amount;
        $data->due = $request->due;
        $data->description = $request->description;

        $data->save();

        return $this->returnMessage('Student Fee Collection Successfulliy','success');
    }

    /**
     * Display the specified resource.
     */
    public function show(FeeCollection $feecollection)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FeeCollection $feecollection)
    {
        return $feecollection;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,FeeCollection $feecollection)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FeeCollection $feecollection)
    {
        $feecollection->delete();
        return $this->returnMessage('Student Fees Delete!','info');
    }
}
