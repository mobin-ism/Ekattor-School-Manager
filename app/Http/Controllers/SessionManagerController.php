<?php

namespace App\Http\Controllers;

use App\Session;
use App\Setting;
use Illuminate\Http\Request;
use Auth;

class SessionManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('backend.'.Auth::user()->role.'.session.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.Auth::user()->role.'.session.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(count(Session::where('name', $request->session_title)->get()) == 0){
            $session = new Session;
            $session->name = $request->session_title;
            $session->school_id = 1;
            $session->save();
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.session.list')->render(),
                'notification' =>"Session Added Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.session.list')->render(),
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
        return view('backend.'.Auth::user()->role.'.session.edit', compact('session'));
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
                'view' => view('backend.'.Auth::user()->role.'.session.list')->render(),
                'notification' =>"Session Updated Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.session.list')->render(),
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
                'view' => view('backend.'.Auth::user()->role.'.session.list')->render(),
                'notification' =>"Session Deleted Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.session.list')->render(),
                'notification' =>"An Error Occured When Deleting Session"
            );
        }
        return $data;
    }

    public function active($id)
    {
        $session = Session::find($id);
        $setting = Setting::find(1);
        $setting->running_session = $session->id;

        if($setting->save()){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.session.list')->render(),
                'notification' =>"Session Activated Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.session.list')->render(),
                'notification' =>"An Error Occured When Activating Session"
            );
        }
        return $data;
    }
}
