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
        $title = "System Settings";
        $settings_type = "system";
        return view('backend.'.Auth::user()->role.'.settings.index', compact('settings_type', 'title'));
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
                'view' => "",
                'notification' =>"System Updated Successfully"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => "",
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
                'view' => "",
                'notification' =>"Please reload the browser to load the image"
            );
        }else {
            $data = array(
                'status' => false,
                'view' => "",
                'notification' =>"An Error Occured When Updating System"
            );
        }
        return $data;
    }

    public function payment()
    {
        $title = "Payment Settings";
        $settings_type = "payment";
        return view('backend.'.Auth::user()->role.'.settings.index', compact('settings_type', 'title'));
    }

    public function payment_update(Request $request, $type)
    {
        $settings = Setting::find(1);
        if($type == 'stripe'){
            $settings->stripe_active = $request->stripe_active;
            $settings->stripe_mode = $request->stripe_mode;
            $settings->stripe_test_secret_key = $request->stripe_test_secret_key;
            $settings->stripe_test_public_key = $request->stripe_test_public_key;
            $settings->stripe_live_secret_key = $request->stripe_live_secret_key;
            $settings->stripe_live_public_key = $request->stripe_live_public_key;
            $settings_type = "payment";

            if($settings->save()){
                $data = array(
                    'status' => true,
                    'view' => "",
                    'notification' =>"Stripe Settings Updated Successfully"
                );
            }else {
                $data = array(
                    'status' => false,
                    'view' => "",
                    'notification' =>"An Error Occured When Updating Stripe Settings"
                );
            }
        }elseif($type == 'paypal'){
            $settings->paypal_active = $request->paypal_active;
            $settings->paypal_mode = $request->paypal_mode;
            $settings->paypal_client_id_sandbox = $request->paypal_client_id_sandbox;
            $settings->paypal_client_id_production = $request->paypal_client_id_production;
            $settings_type = "payment";

            if($settings->save()){
                $data = array(
                    'status' => true,
                    'view' => "",
                    'notification' =>"Paypal Settings Updated Successfully"
                );
            }else {
                $data = array(
                    'status' => false,
                    'view' => "",
                    'notification' =>"An Error Occured When Updating Paypal Settings"
                );
            }
        }
        return $data;
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
