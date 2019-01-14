<?php

namespace App\Http\Controllers;

use App\Student;
use App\Section;
use App\Enroll;
use App\User;
use Hash;
use Auth;
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
        $title = "Student List";
        return view('backend.'.Auth::user()->role.'.student.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $title = "Student Admission";
        $type = 'single';
        return view('backend.'.Auth::user()->role.'.student.create', compact('type', 'title'));
    }

    public function bulk_student_create()
    {   
        $title = "Student Admission";
        $type = 'bulk';
        return view('backend.'.Auth::user()->role.'.student.create', compact('type', 'title'));
    }

    public function excel_student_create()
    {   
        $title = "Student Admission";
        $type = 'excel';
        return view('backend.'.Auth::user()->role.'.student.create', compact('type', 'title'));
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

            if ($request->hasFile('student_image')) {
                $dir  = 'backend/images/student_image';
                $student_image = $request->file('student_image');
                $student_image->move($dir, $student_id.".jpg");
            }

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
                    // $student->parent_id = $request->parent_id[$key];
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
        $data = array(
            'status' => true,
            'view' => "",
            'notification' =>"Student Added Successfully"
        );
        }else {
            $data = array(
                'status' => false,
                'view' => "",
                'notification' =>"You must have to select class and section"
            );
        }
        return $data;

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
        return view('backend.'.Auth::user()->role.'.student.list', compact('students'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('backend.'.Auth::user()->role.'.student.edit', compact('student'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $user    = User::find($student->user_id);
        $query   = Enroll::where(array('student_id' => $id, 'session' => get_settings('running_session')))->first();
        $enroll  = Enroll::find($query->id);
        if(count(User::where('email', $request->email)->where('id', '!=', $student->user->id)->get()) == 0) {

            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = "student";
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->birthday = strtotime($request->birthday);
            $user->gender = $request->gender;
            $user->school_id = get_settings('selected_branch');
            $user->save();

            $student->parent_id = $request->parent_id;
            $student->school_id = get_settings('selected_branch');
            $student->save();

            $enroll->class_id = $request->class_id;
            $enroll->section_id = $request->section_id;
            $enroll->school_id = get_settings('selected_branch');
            $enroll->session = get_settings('running_session');
            $enroll->save();

            if ($request->hasFile('student_image')) {
                $dir  = 'backend/images/student_image';
                $student_image = $request->file('student_image');
                $student_image->move($dir, $id.".jpg");
            }
            
            $student = Student::find($id);
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.student.update', compact('student'))->render(),
                'notification' =>"Student Updated Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.student.update', compact('student'))->render(),
                'notification' =>"Email Duplication"
            );
        }

        return $data;
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
        return view('backend.'.Auth::user()->role.'.student.profile', compact('student_details'));
    }
}
