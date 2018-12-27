<?php

namespace App\Http\Controllers;

use App\Exam;
use Auth;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.'.Auth::user()->role.'.exam.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.Auth::user()->role.'.exam.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $exam = new Exam;
        $exam->name = $request->name;
        $exam->date = strtotime($request->date);
        $exam->school_id = school_id();
        $exam->session = get_settings('running_session');
        if($exam->save()){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.exam.list')->render(),
                'notification' =>"Exam Added Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.exam.list')->render(),
                'notification' =>"An Error Occured When Adding Exam"
            );
        }
        return $data;
        // flash("Exam Added Successfully")->success();
        // return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $exam = Exam::find($id);
        return view('backend.'.Auth::user()->role.'.exam.edit', compact('exam'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $exam = Exam::find($id);
        $exam->name = $request->name;
        $exam->date = strtotime($request->date);
        $exam->school_id = school_id();
        $exam->session = get_settings('running_session');
        if($exam->save()){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.exam.list')->render(),
                'notification' =>"Exam Updated Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.exam.list')->render(),
                'notification' =>"An Error Occured When Updating Exam"
            );
        }
        return $data;
        // flash("Exam Updated Successfully")->success();
        // return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Exam::destroy($id)){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.exam.list')->render(),
                'notification' =>"Exam Deleted Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.exam.list')->render(),
                'notification' =>"An Error Occured When Deleting Exam"
            );
        }
        return $data;
    }
}