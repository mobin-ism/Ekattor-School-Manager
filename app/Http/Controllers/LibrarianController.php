<?php

namespace App\Http\Controllers;

use App\Librarian;
use App\User;
use Hash;
use Auth;
use Illuminate\Http\Request;

class LibrarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $title = "Librarian";
        return view('backend.'.Auth::user()->role.'.librarian.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.Auth::user()->role.'.librarian.create');
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
            $user->role = "librarian";
            $user->school_id = 1;
            $user->phone = $request->phone;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->blood_group = $request->blood_group;
            if($user->save()) {
                $data = array(
                    'status' => true,
                    'view' => view('backend.'.Auth::user()->role.'.librarian.list')->render(),
                    'notification' =>"Librarian Added Successfully"
                );
            }
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.librarian.list')->render(),
                'notification' =>"Email Duplication"
            );
        }

        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Librarian  $librarian
     * @return \Illuminate\Http\Response
     */
    public function show(Librarian $librarian)
    {
        //
    }

    public function list()
    {
        return view('backend.'.Auth::user()->role.'.librarian.list')->render();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Librarian  $librarian
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('backend.'.Auth::user()->role.'.librarian.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Librarian  $librarian
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
                    'view' => view('backend.'.Auth::user()->role.'.librarian.list')->render(),
                    'notification' =>"Librarian Updated Successfully"
                );
            }
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.librarian.list')->render(),
                'notification' =>"Email Duplication"
            );
        }
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Librarian  $librarian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return array(
            'status' => true,
            'view' => view('backend.'.Auth::user()->role.'.librarian.list')->render(),
            'notification' =>"Librarian has been deleted successfully"
        );
    }
}
