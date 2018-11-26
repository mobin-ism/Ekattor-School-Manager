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
        $type = 'single';
        return view('backend.admin.student.create', compact('type'));
    }

    public function bulk_student_create()
    {
        $type = 'bulk';
        return view('backend.admin.student.create', compact('type'));
    }

    public function excel_student_create()
    {
        $type = 'excel';
        return view('backend.admin.student.create', compact('type'));
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
            $user->role = "student";
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->birthday = strtotime($request->birthday);
            $user->gender = $request->gender;
            $user->school_id = get_settings('selected_branch');
            $user->save();

            $user_id = $user->id;
            $student = new Student;
            $student->user_id = $user_id;
            $student->code = substr(md5(uniqid(rand(), true)), 0, 7);
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

            $data = array(
                'status' => true,
                'view' => "",
                'notification' =>"Student Added Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => "",
                'notification' =>"Email Duplication"
            );
        }

        return $data;
    }


    public function bulk_student_store(Request $request) {
        foreach($request->name as $key=> $row) {
            if($row != ""){
                if(count(User::where('email', $request->email[$key])->get()) == 0) {
                    $user = new User;
                    $user->name = $request->name[$key];
                    $user->email = $request->email[$key];
                    $user->password = Hash::make($request->password[$key]);
                    $user->role = "student";
                    $user->phone = $request->phone[$key];
                    $user->gender = $request->gender[$key];
                    $user->school_id = get_settings('selected_branch');
                    $user->save();

                    $user_id = $user->id;
                    $student = new Student;
                    $student->user_id = $user_id;
                    $student->code = substr(md5(uniqid(rand(), true)), 0, 7);
                    $student->parent_id = $request->parent_id[$key];
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
                }
                else{
                    flash($request->email[$key].' already exist')->error();
                }
            }
        }
        flash('Success')->success();
        return back();
    }

    public function excel_student_store(Request $request) {
        if($request->class_id > 0 && $request->section_id > 0) {

            if ($request->hasFile('csv_file')) {

                $request->file('csv_file')->move('csv', 'bulk_student.csv');
                $csv = array_map('str_getcsv', file(asset('csv/bulk_student.csv')));
                $count = 1;
                $array_size = sizeof($csv);

             foreach ($csv as $row) {
                  if ($count == 1) {
                      $count++;
                      continue;
                  }
                  $password = $row[3];

                  $name      = $row[0];
                  $email     = $row[1];
                  $password  = Hash::make($row[2]);
                  $phone     = $row[3];
                  $parent_id = $row[4];
                  $gender    = strtolower($row[5]);

                  if(count(User::where('email', $email)->get()) == 0) {
                    $user = new User;
                    $user->name = $name;
                    $user->email = $email;
                    $user->password = Hash::make($password);
                    $user->role = "student";
                    $user->phone = $phone;
                    $user->gender = $gender;
                    $user->school_id = get_settings('selected_branch');
                    $user->save();

                    $user_id = $user->id;
                    $student = new Student;
                    $student->user_id = $user_id;
                    $student->code = substr(md5(uniqid(rand(), true)), 0, 7);
                    $student->parent_id = $parent_id;
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
                }
                else{
                    flash($email.' already exist')->error();
                }
              }
            }
        }else {
            flash('You must have selcted Class and Section')->error();
        }
        return back();

    }

    public function generate_csv_file() {
        $file   = fopen("csv/bulk_student.csv", "w");
        $line   = array('StudentName', 'Email', 'Password', 'Phone', 'ParentID', 'Gender');
        fputcsv($file, $line, ',');
        echo $file_path = asset('csv/bulk_student.csv');
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
