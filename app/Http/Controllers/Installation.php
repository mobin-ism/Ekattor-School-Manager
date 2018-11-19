<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;
use DB;
use App\User;
use App\Setting;
use App\Branch;
use Hash;
class Installation extends Controller
{
    public function step0() {
        return view('backend.installation.step0');
    }

    public function step1() {
        $permission['curl_enabled']           = function_exists('curl_version');
        $permission['db_file_write_perm']     = is_writable(base_path('.env'));
        $permission['routes_file_write_perm'] = is_writable(base_path('app/Providers/RouteServiceProvider.php'));
        return view('backend.installation.step1', compact('permission'));
    }

    public function step2() {
        return view('backend.installation.step2');
    }

    public function step3($error = "") {

        if($error == ""){
            return view('backend.installation.step3');
        }else {
            return view('backend.installation.step3', compact('error'));
        }
    }

    public function step4() {
        return view('backend.installation.step4');
    }

    public function step5() {
        return view('backend.installation.step5');
    }

    public function step6() {
        return view('backend.installation.step6');
    }

    public function system_settings(Request $request) {
        $settings = new Setting;
        $branch = new Branch;
        $user = new User;

        $branch->name = $request->school_name;
        $branch->save();

        $settings->system_name = $request->system_name;
        $settings->system_email = $request->system_email;
        $settings->selected_branch = $branch->id;
        $settings->save();

        $user->name = $request->admin_name;
        $user->email = $request->admin_email;
        $user->password = Hash::make($request->admin_password);
        $user->save();

        return redirect('step6');
    }
    public function database_installation(Request $request) {

        if(self::check_database_connection($request->DB_HOST, $request->DB_DATABASE, $request->DB_USERNAME, $request->DB_PASSWORD)) {
            $path = base_path('.env');
            if (file_exists($path)) {
                foreach ($request->types as $type) {
                    file_put_contents($path, str_replace(
                        $type.'='.env($type), $type.'='.$request[$type], file_get_contents($path)
                    ));
                }
                return redirect('step4');
            }else {
                return redirect('step3');
            }
        }else {
            return redirect('step3/database_error');
        }
    }

    public function import_sql() {
        //Artisan::call('migrate:fresh', array('--path' => 'database/migrations', '--force' => true));
        $sql_path = base_path('install.sql');
        DB::unprepared(file_get_contents($sql_path));
        return redirect('step5');
    }

    function check_database_connection($db_host = "", $db_name = "", $db_user = "", $db_pass = "") {

        if(@mysqli_connect($db_host, $db_user, $db_pass, $db_name)) {
            return true;
        }else {
            return false;
        }
    }

    function proceedToLogin() {

    }
}
