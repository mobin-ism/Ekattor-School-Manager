<?php

namespace App\Http\Controllers;

use App\Subject;
use App\Classes;
use Auth;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.'.Auth::user()->role.'.subject.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.Auth::user()->role.'.subject.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $subject = new Subject;
        $subject->class_id = $request->class_id;
        $subject->name = $request->name;
        $subject->school_id = school_id();
        $subject->session = get_settings('running_session');

        if($subject->save()){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.subject.list')->render(),
                'notification' =>"Subject Added Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.subject.list')->render(),
                'notification' =>"An Error Occured When Adding Subject"
            );
        }
        return $data;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show($class_id)
    {
        $running_session = get_settings('running_session');
        $school_id = school_id();
        $checker = array(
            'class_id' => $class_id,
            'session' => $running_session,
            'school_id' => $school_id
        );
        $subjects = Subject::where($checker)->get();
        return view('backend.'.Auth::user()->role.'.subject.list', compact('subjects', 'class_id'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit($subject_id)
    {
        $subject = Subject::find($subject_id);
        return view('backend.'.Auth::user()->role.'.subject.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $subject_id)
    {
        $subject = Subject::find($subject_id);

        $subject->name = $request->name;
        $subject->class_id = $request->class_id;

        if($subject->save()){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.subject.list')->render(),
                'notification' =>"Subject Updated Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.subject.list')->render(),
                'notification' =>"An Error Occured When Updating Subject"
            );
        }
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($subject_id)
    {

        if(Subject::destroy($subject_id)){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.subject.list')->render(),
                'notification' =>"Subject Deleted Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.subject.list')->render(),
                'notification' =>"An Error Occured When Deleting Subject"
            );
        }
        return $data;
    }
}
