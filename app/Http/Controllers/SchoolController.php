<?php

namespace App\Http\Controllers;

use App\School;
use App\Setting;
use Auth;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.'.Auth::user()->role.'.school.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.Auth::user()->role.'.school.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $school = new School;
        $school->name = $request->name;
        if($school->save()) {
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.school.list')->render(),
                'notification' =>"School Added Successfully"
            );
        }
        else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.school.list')->render(),
                'notification' =>"An Error Occured When Adding School"
            );
        }
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function show(School $school)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $school = School::find($id);
        return view('backend.'.Auth::user()->role.'.school.edit', compact('school'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $school = School::find($id);
        $school->name = $request->name;

        if($school->save()){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.school.list')->render(),
                'notification' =>"School Updated Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.school.list')->render(),
                'notification' =>"An Error Occured When Updating School"
            );
        }
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\School  $school
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(School::destroy($id)){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.school.list')->render(),
                'notification' =>"School Deleted Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.school.list')->render(),
                'notification' =>"An Error Occured When Deleting School"
            );
        }
        return $data;
    }

    public function switch($id)
    {
        $school = School::find($id);
        $setting = Setting::find(1);
        $setting->selected_branch = $school->id;

        if($setting->save()){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.school.list')->render(),
                'notification' =>"School Switched Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.school.list')->render(),
                'notification' =>"An Error Occured When Switching School"
            );
        }
        return $data;
    }
}
