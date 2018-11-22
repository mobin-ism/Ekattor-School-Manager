<?php

namespace App\Http\Controllers;

use App\Student;
use App\Section;
use App\Enroll;
use App\User;
use Hash;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.student.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.student.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = request()->validate([
        //         'name'       => 'required',
        //         'email'      => 'required',
        //         'password'   => 'required',
        //         'parent_id'  => 'required',
        //         'address'    => 'required',
        //         'phone'      => 'required',
        //         'birthday'   => 'required',
        //         'code'       => 'required',
        //         'class_id'   => 'required',
        //         'section_id' => 'required',
        //         'gender'     => 'required'
        //     ]);

        if(count(User::where('email', $request->email)->get()) == 0) {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 5;
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->birthday = strtotime($request->birthday);
            $user->gender = $request->gender;
            $user->school_id = get_settings('selected_branch');
            $user->save();

            $user_id = $user->id;
            $student = new Student;
            $student->user_id = $user_id;
            $student->code = $request->code;
            $student->parent_id = $request->parent_id;
            $student->school_id = get_settings('selected_branch');
            $student->save();
            $student_id = $student->id;

            $enroll = new Enroll;
            $enroll->student_id = $student_id;
            $enroll->class_id = $request->class_id;
            $enroll->section_id = $request->section_id;
            $enroll->school_id = get_settings('selected_branch');
            $enroll->session = get_settings('running_session');
            $enroll->save();

            flash('Student Added Successfully')->success();
        }else {
            flash('Email Duplication')->error();
        }

        return redirect('student/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($section_id)
    {
        $section  = Section::find($section_id);
        $class_id = $section->class->id;
        $running_session = get_settings('running_session');
        $school_id = get_settings('selected_branch');
        $students = Enroll::where(['section_id' => $section_id, 'class_id' => $class_id, 'session' => $running_session, 'school_id' => $school_id])->get();
        return view('backend.admin.student.list', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }

    function profile($student_id) {
        $student_details = Student::find($student_id)->first();
        return view('backend.admin.student.profile', compact('student_details'));
    }
}
