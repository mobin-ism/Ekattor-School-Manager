<?php

namespace App\Http\Controllers;

use App\Expense;
use Auth;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.'.Auth::user()->role.'.expense.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.Auth::user()->role.'.expense.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $expense = new Expense;
        $expense->date = strtotime($request->date);
        $expense->amount = $request->amount;
        $expense->expense_category_id = $request->expense_category_id;
        $expense->school_id = school_id();
        $expense->session = get_settings('running_session');
        if($expense->save()){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.expense.list')->render(),
                'notification' =>"Expense Added Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.expense.list')->render(),
                'notification' =>"An Error Occured When Adding Expense"
            );
        }
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense = Expense::find($id);
        return view('backend.'.Auth::user()->role.'.expense.edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $expense = Expense::find($id);
        $expense->date = strtotime($request->date);
        $expense->amount = $request->amount;
        $expense->expense_category_id = $request->expense_category_id;
        $expense->school_id = school_id();
        $expense->session = get_settings('running_session');
        if($expense->save()){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.expense.list')->render(),
                'notification' =>"Expense Updated Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.expense.list')->render(),
                'notification' =>"An Error Occured When Updating Expense"
            );
        }
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Expense::destroy($id)){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.expense.list')->render(),
                'notification' =>"Expense Deleted Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.expense.list')->render(),
                'notification' =>"An Error Occured When Deleting Expense"
            );
        }
        return $data;
    }
}
