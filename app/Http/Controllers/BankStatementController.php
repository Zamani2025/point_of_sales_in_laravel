<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Deposit;

class BankStatementController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('bank_statements.index');
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
        $deposit = new Deposit();
        $deposit->account_name = $request->account_name;
        $deposit->bank_name = $request->bank_name;
        $deposit->amount = $request->amount;
        $deposit->date = $request->date;
        $deposit->account_number = $request->account_number;

        $deposit->save();
        toastr()->success('Statement added successfully');
        return back();
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
