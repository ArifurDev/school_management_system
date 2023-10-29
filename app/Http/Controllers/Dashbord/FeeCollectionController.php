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
        $users = DB::table('users')->where('student_status',['running','passing'])
                    ->join('fee_collections', 'users.id', '=', 'fee_collections.user_id')
                    ->select('users.name', 'users.email', 'users.phone', 'users.image', 'users.section', 'users.class_id' ,'fee_collections.date','fee_collections.expense','fee_collections.amount','fee_collections.due','fee_collections.description')
                    ->get();
        return view('dashbord.FeeCollection.index',compact('users'));
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
