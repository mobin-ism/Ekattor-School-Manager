<?php

namespace App\Http\Controllers;

use App\BookIssue;
use App\Enroll;
use Auth;
use Illuminate\Http\Request;

class BookIssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $title = "Book Issue";
        return view('backend.'.Auth::user()->role.'.book_issue.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.Auth::user()->role.'.book_issue.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $book_issue = new BookIssue;
        $book_issue->book_id    = $request->book_id;
        $book_issue->class_id   = $request->class_id;
        $book_issue->student_id = $request->student_id;
        $book_issue->issue_date = strtotime($request->issue_date);
        $book_issue->school_id  = school_id();
        $book_issue->session    = get_settings('running_session');

        if($book_issue->save()){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.book_issue.list')->render(),
                'notification' =>"Book Issued Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.book_issue.list')->render(),
                'notification' =>"An Error Occured When Issuing Book"
            );
        }
        flash("Book Issued Successfully")->success();
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BookIssue  $bookIssue
     * @return \Illuminate\Http\Response
     */
    public function show(BookIssue $bookIssue)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BookIssue  $bookIssue
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book_issue = BookIssue::find($id);
        return view('backend.'.Auth::user()->role.'.book_issue.edit', compact('book_issue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BookIssue  $bookIssue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $book_issue = BookIssue::find($id);
        $book_issue->book_id    = $request->book_id;
        $book_issue->class_id   = $request->class_id;
        $book_issue->student_id = $request->student_id;
        $book_issue->issue_date = strtotime($request->issue_date);
        $book_issue->school_id  = school_id();
        $book_issue->session    = get_settings('running_session');

        if($book_issue->save()){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.book_issue.list')->render(),
                'notification' =>"Book Issued Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.book_issue.list')->render(),
                'notification' =>"An Error Occured When Issuing Book"
            );
        }
        flash("Book Issued Successfully")->success();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BookIssue  $bookIssue
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(BookIssue::destroy($id)){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.book_issue.list')->render(),
                'notification' =>"Book Issue Info Deleted Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.book_issue.list')->render(),
                'notification' =>"An Error Occured When Deleting Book Issue Info"
            );
        }
        return $data;
    }

    public function return($id)
    {
        $book_issue = BookIssue::find($id);
        $book_issue->status = 1;
        if($book_issue->save()){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.book_issue.list')->render(),
                'notification' =>"Book Returned Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.book_issue.list')->render(),
                'notification' =>"An Error Occured When Returning Book"
            );
        }
        return $data;
    }

    public function student($class_id) {
        $running_session = get_settings('running_session');
        $school_id = school_id();
        $students = Enroll::where(['class_id' => $class_id, 'session' => $running_session, 'school_id' => $school_id])->get();
        return view('backend.'.Auth::user()->role.'.book_issue.student', compact('students'));
    }
}
