<?php

namespace App\Http\Controllers;

use App\Session;
use Illuminate\Http\Request;

class SessionManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.session.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.session.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $session = new Session;
        $session->name = $request->session_title;
        $session->school_id = 1;
        if($session->save()){
            $data = array(
                'status' => true,
                'view' => view('backend.admin.session.session')->render(),
                'notification' =>"Session Added Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.admin.session.session')->render(),
                'notification' =>"An Error Occured When Adding Session"
            );
        }
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function show(Session $session)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $session = Session::find($id);
        return view('backend.admin.session.edit', compact('session'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $session = Session::find($id);
        $session->name = $request->session_title;
        $session->school_id = 1;

        if($session->save()){
            $data = array(
                'status' => true,
                'view' => view('backend.admin.session.session')->render(),
                'notification' =>"Session Updated Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.admin.session.session')->render(),
                'notification' =>"An Error Occured When Updating Session"
            );
        }
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Session  $session
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Session::destroy($id)){
            $data = array(
                'status' => true,
                'view' => view('backend.admin.session.session')->render(),
                'notification' =>"Session Deleted Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.admin.session.session')->render(),
                'notification' =>"An Error Occured When Deleting Session"
            );
        }
        return $data;
    }
}
