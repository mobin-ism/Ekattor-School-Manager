<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;

class Installation extends Controller
{
    public function install($step = "") {
        if ($step) {
            return view('backend.installation.database_setup');
        }else {
            echo 'first step';
        }
    }

    function database_installation(Request $request) {
        $path = base_path('.env');

        if (file_exists($path)) {
            foreach ($request->types as $type) {
                file_put_contents($path, str_replace(
                    $type.'='.env($type), $type.'='.$request[$type], file_get_contents($path)
                ));
            }

            Artisan::call('migrate:fresh', array('--path' => 'database/migrations', '--force' => true));
        }
    }
}
