<?php

namespace App\Http\Controllers;

use App\Parents;
use App\User;
use Hash;
use Auth;
use Illuminate\Http\Request;

class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.'.Auth::user()->role.'.parent.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.Auth::user()->role.'.parent.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(count(User::where('email', $request->email)->get()) == 0) {
            $user = new User;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->role = "parent";
            $user->school_id = 1;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->blood_group = $request->blood_group;
            if($user->save()) {
                $data = array(
                    'status' => true,
                    'view' => view('backend.'.Auth::user()->role.'.parent.list')->render(),
                    'notification' =>"Parent Added Successfully"
                );
            }
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.parent.list')->render(),
                'notification' =>"Email Duplication"
            );
        }

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Parent  $parent
     * @return \Illuminate\Http\Response
     */
    public function show(Parent $parent, $id)
    {
        $user = User::find($id);
        return view('backend.'.Auth::user()->role.'.parent.children', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Parent  $parent
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.'.Auth::user()->role.'.parent.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Parent  $parent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if(count(User::where('email', $request->email)->where('id', '!=', $user->id)->get()) == 0) {
            $user->name = $request->name;
            $user->email = $request->email;
            $user->school_id = 1;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->blood_group = $request->blood_group;
            if($user->save()) {
                $data = array(
                    'status' => true,
                    'view' => view('backend.'.Auth::user()->role.'.parent.list')->render(),
                    'notification' =>"Parent Updated Successfully"
                );
            }
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.parent.list')->render(),
                'notification' =>"Email Duplication"
            );
        }
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Parent  $parent
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return array(
            'status' => true,
            'view' => view('backend.'.Auth::user()->role.'.parent.list')->render(),
            'notification' =>"Parent has been deleted successfully"
        );
    }
}
