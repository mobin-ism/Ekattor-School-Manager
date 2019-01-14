<?php

namespace App\Http\Controllers;

use App\Alumni;
use Illuminate\Http\Request;
use Auth;

class AlumniController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.'.Auth::user()->role.'.alumni.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.Auth::user()->role.'.alumni.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $alumni = new Alumni;
        $alumni->name = $request->name;
        $alumni->email = $request->email;
        $alumni->phone = $request->phone;
        $alumni->session = $request->session;
        $alumni->school_id = get_settings('selected_branch');
        if($alumni->save()){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.alumni.list')->render(),
                'notification' =>"Alumni Added Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.alumni.list')->render(),
                'notification' =>"An error occurred when adding Alumni"
            );
        }

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function show(Alumni $alumni)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $alumni = Alumni::find($id);
        return view('backend.'.Auth::user()->role.'.alumni.edit', compact('alumni'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $alumni = Alumni::find($id);
        $alumni->name = $request->name;
        $alumni->email = $request->email;
        $alumni->phone = $request->phone;
        $alumni->session = $request->session;
        $alumni->school_id = get_settings('selected_branch');
        if($alumni->save()){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.alumni.list')->render(),
                'notification' =>"Alumni Added Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.alumni.list')->render(),
                'notification' =>"An error occurred when adding Alumni"
            );
        }

        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Alumni  $alumni
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Alumni::destroy($id)){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.alumni.list')->render(),
                'notification' =>"Alumnus Deleted Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.alumni.list')->render(),
                'notification' =>"An Error Occured When Deleting Alumnus"
            );
        }
        return $data;

    }
}
