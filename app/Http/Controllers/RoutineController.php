<?php

namespace App\Http\Controllers;

use App\Routine;
use App\Subject;
use App\Teacher;
use App\Section;
use Auth;
use Illuminate\Http\Request;

class RoutineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.'.Auth::user()->role.'.routine.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.Auth::user()->role.'.routine.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $routine = new Routine;
        $class_id  = $request->class_id;
        $section_id = $request->section_id;
        $routine->class_id = $class_id;
        $routine->section_id = $section_id;
        $routine->subject_id = $request->subject_id;
        $routine->starting_hour = $request->starting_hour;
        $routine->ending_hour = $request->ending_hour;
        $routine->starting_minute = $request->starting_minute;
        $routine->ending_minute = $request->ending_minute;
        $routine->day = $request->day;
        $routine->session = get_settings('running_session');
        $routine->school_id = school_id();
        if($routine->save()){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.routine.list', compact('class_id', 'section_id'))->render(),
                'notification' =>"Class Routine Added Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.routine.list', compact('class_id', 'section_id'))->render(),
                'notification' =>"An Error Occured When Adding Class Routine"
            );
        }
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Routine  $routine
     * @return \Illuminate\Http\Response
     */
    public function show($section_id)
    {
        $class_id = Section::where('id', $section_id)->pluck('class_id')->first();
        return view('backend.'.Auth::user()->role.'.routine.list', compact('class_id', 'section_id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Routine  $routine
     * @return \Illuminate\Http\Response
     */
    public function edit($routine_id)
    {
        $routine = Routine::find($routine_id);
        return view('backend.'.Auth::user()->role.'.routine.edit', compact('routine'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Routine  $routine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $routine_id)
    {
        $routine = Routine::find($routine_id);
        $class_id  = $request->class_id;
        $section_id = $request->section_id;
        $routine->class_id = $class_id;
        $routine->section_id = $section_id;
        $routine->subject_id = $request->subject_id;
        $routine->starting_hour = $request->starting_hour;
        $routine->ending_hour = $request->ending_hour;
        $routine->starting_minute = $request->starting_minute;
        $routine->ending_minute = $request->ending_minute;
        $routine->day = $request->day;
        $routine->session = get_settings('running_session');
        $routine->school_id = school_id();
        if($routine->save()){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.routine.list', compact('class_id', 'section_id'))->render(),
                'notification' =>"Class Routine Updated Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.routine.list', compact('class_id', 'section_id'))->render(),
                'notification' =>"An Error Occured When Updating Class Routine"
            );
        }
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Routine  $routine
     * @return \Illuminate\Http\Response
     */
    public function destroy($routine_id)
    {
        $routine = Routine::find($routine_id);
        $class_id  = $routine->class_id;
        $section_id = $routine->section_id;
        if(Routine::destroy($routine_id)){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.routine.list', compact('class_id', 'section_id'))->render(),
                'notification' =>"Class Routine Deleted Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.routine.list', compact('class_id', 'section_id'))->render(),
                'notification' =>"An Error Occured When Deleting Class Routine"
            );
        }
        return $data;
    }


    public function subject($class_id) {
        $checker = array(
            'class_id'  => $class_id,
            'school_id' => school_id(),
            'session'   => get_settings('running_session')
        );
        $subjects = Subject::where($checker)->get();
        return view('backend.'.Auth::user()->role.'.routine.subject', compact('subjects'));
    }
}