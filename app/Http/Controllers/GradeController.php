<?php

namespace App\Http\Controllers;

use App\Grade;
use Auth;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $title = "Exam Grade";
        return view('backend.'.Auth::user()->role.'.grade.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.Auth::user()->role.'.grade.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $grade = new Grade;
        $grade->name = $request->name;
        $grade->grade_point = $request->grade_point;
        $grade->mark_from = $request->mark_from;
        $grade->mark_upto = $request->mark_upto;
        $grade->comment = $request->comment;
        $grade->school_id = school_id();
        $grade->session = get_settings('running_session');
        if($grade->save()){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.grade.list')->render(),
                'notification' =>"Grade Added Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.grade.list')->render(),
                'notification' =>"An Error Occured When Adding Grade"
            );
        }
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function show(Grade $grade)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $grade = Grade::find($id);
        return view('backend.'.Auth::user()->role.'.grade.edit', compact('grade'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $grade = Grade::find($id);
        $grade->name = $request->name;
        $grade->grade_point = $request->grade_point;
        $grade->mark_from = $request->mark_from;
        $grade->mark_upto = $request->mark_upto;
        $grade->comment = $request->comment;
        $grade->school_id = school_id();
        $grade->session = get_settings('running_session');
        if($grade->save()){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.grade.list')->render(),
                'notification' =>"Grade Updated Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.grade.list')->render(),
                'notification' =>"An Error Occured When Updating Grade"
            );
        }
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Grade  $grade
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Grade::destroy($id)){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.grade.list')->render(),
                'notification' =>"Grade Deleted Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.grade.list')->render(),
                'notification' =>"An Error Occured When Deleting Grade"
            );
        }
        return $data;
    }
}
