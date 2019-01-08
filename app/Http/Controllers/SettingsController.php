<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use Auth;

class SettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function system()
    {   
        $settings_type = "system";
        return view('backend.'.Auth::user()->role.'.settings.index', compact('settings_type'));
    }
    public function system_update(Request $request)
    {   
        $settings = Setting::find(1);
        $settings->system_name = $request->system_name;
        $settings->system_email = $request->system_email;
        $settings->phone = $request->phone;
        $settings->purchase_code = $request->purchase_code;
        $settings->address = $request->address;

        $settings_type = "system";
        
        if($settings->save()){
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.settings.system', compact('settings_type'))->render(),
                'notification' =>"System Updated Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.settings.system', compact('settings_type'))->render(),
                'notification' =>"An Error Occured When Updating System"
            );
        }
        return $data;
    }

    public function logo_update(Request $request) {
        if ($request->hasFile('logo')) {
            $dir  = 'backend/images';
            $logo = $request->file('logo');
            $logo->move($dir, 'logo-dark.png');
            $data = array(
                'status' => true,
                'view' => view('backend.'.Auth::user()->role.'.settings.system', compact('settings_type'))->render(),
                'notification' =>"System Updated Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => view('backend.'.Auth::user()->role.'.settings.system', compact('settings_type'))->render(),
                'notification' =>"An Error Occured When Updating System"
            );
        }
        return $data;
    }

    public function payment()
    {
        //
    }
    public function sms()
    {
        //
    }
    public function language()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}
