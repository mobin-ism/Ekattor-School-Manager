<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\User;
use Illuminate\Http\Request;
use Hash;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.admin.teacher.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admin.teacher.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->all()  );
        if(count(User::where('email', $request->email)->get()) == 0) {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = 3;
            $user->phone = $request->phone;
            $user->address = $request->address;
            // $user->birthday = strtotime($request->birthday);
            $user->gender = $request->gender;
            $user->blood_group = $request->blood_group;
            if($user->save()) {
                $teacher = new Teacher;
                $teacher->department_id = 1;
                $teacher->designation = $request->designation;
                $teacher->user_id = $user->id;
                $teacher->school_id = 1;
                $teacher->save();

                $data = array(
                    'status' => true,
                    'view' => view('backend.admin.teacher.list')->render(),
                    'notification' =>"Teacher Added Successfully"
                );
            }
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.admin.teacher.list')->render(),
                'notification' =>"Email Duplication"
            );
        }

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::find($id);
        return view('backend.admin.teacher.edit', compact('teacher'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $teacher = Teacher::find($id);
        if(count(User::where('email', $request->email)->where('id', '!=', $teacher->user->id)->get()) == 0) {
            $user = User::find($teacher->user_id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->role = 3;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->blood_group = $request->blood_group;
            if($user->save()) {
                $teacher->department_id = 1;
                $teacher->designation = $request->designation;
                $teacher->school_id = 1;
                $teacher->save();

                $data = array(
                    'status' => true,
                    'view' => view('backend.admin.teacher.list')->render(),
                    'notification' =>"Teacher Updated Successfully"
                );
            }
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.admin.teacher.list')->render(),
                'notification' =>"Email Duplication"
            );
        }

        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::find($id);
        $teacher->delete();
        $teacher->user->delete();
        return array(
            'status' => true,
            'view' => view('backend.admin.teacher.list')->render(),
            'notification' =>"Teacher has been deleted successfully"
        );
    }
}
