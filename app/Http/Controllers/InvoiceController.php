<?php

namespace App\Http\Controllers;

use App\Invoice;
use Auth;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.'.Auth::user()->role.'.invoice.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function single_invoice_create()
    {
        return view('backend.'.Auth::user()->role.'.invoice.create_single');
    }

    public function mass_invoice_create()
    {
        return view('backend.'.Auth::user()->role.'.invoice.create_mass');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function single_invoice_store(Request $request)
    {
        $invoice = new Invoice;
        $invoice->title = $request->title;
        $invoice->total_amount = $request->total_amount;
        $invoice->paid_amount = $request->paid_amount;
        $invoice->class_id = $request->class_id;
        $invoice->student_id = $request->student_id;
        $invoice->status = $request->status;
        $invoice->school_id = school_id();
        $invoice->session = get_settings('running_session');
        if($invoice->save()){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.invoice.list')->render(),
                'notification' =>"Invoice Added Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.invoice.list')->render(),
                'notification' =>"An Error Occured When Adding Invoice"
            );
        }
        return $data;
    }

    public function mass_invoice_store(Request $request)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function single_invoice_edit($id)
    {
        //
    }

    public function mass_invoice_edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function single_invoice_update(Request $request, $id)
    {
        //
    }

    public function mass_invoice_update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}
