<?php

namespace App\Http\Controllers;

use App\ClassRoom;
use Auth;
use Illuminate\Http\Request;

class ClassRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.'.Auth::user()->role.'.class_room.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.Auth::user()->role.'.class_room.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $room = new ClassRoom;
        $room->name = $request->name;
        $room->school_id = school_id();
        if($room->save()){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.class_room.list')->render(),
                'notification' =>"Class Room Added Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.session.list')->render(),
                'notification' =>"An Error Occured When Adding Class Room"
            );
        }
        return $data;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function show(ClassRoom $classRoom)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = ClassRoom::find($id);
        return view('backend.'.Auth::user()->role.'.class_room.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $room = ClassRoom::find($id);
        $room->name = $request->name;
        $room->school_id = school_id();
        if($room->save()){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.class_room.list')->render(),
                'notification' =>"Class Room Updated Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.session.list')->render(),
                'notification' =>"An Error Occured When Updating Class Room"
            );
        }
        return $data;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ClassRoom  $classRoom
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(ClassRoom::destroy($id)){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.class_room.list')->render(),
                'notification' =>"Class Room Deleted Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.class_room.list')->render(),
                'notification' =>"An Error Occured When Deleting Class Room"
            );
        }
        return $data;
    }
}
