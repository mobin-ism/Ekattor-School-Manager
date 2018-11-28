<?php

namespace App\Http\Controllers;

use App\Addon;
use Illuminate\Http\Request;
use ZipArchive;
use DB;
use Auth;

class AddonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.'.Auth::user()->role.'.addon.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.'.Auth::user()->role.'.addon.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('addon_zip')) {
            // Create update directory.
            $dir = 'addons';
            if (!is_dir($dir))
                mkdir($dir, 0777, true);

            $path = $request->addon_zip->store('addons');
            $zipped_file_name = $request->addon_zip->getClientOriginalName();

            //Unzip uploaded update file and remove zip file.
            $zip = new ZipArchive;
            $res = $zip->open($path);
            if ($res === TRUE) {
                $zip->extractTo('addons');
                $zip->close();
                unlink($path);
            }

            $unzipped_file_name = substr($zipped_file_name, 0, -4);

            $str = file_get_contents('./addons/' . $unzipped_file_name . '/update_config.json');
            $json = json_decode($str, true);


            $addon = new Addon;
            if(count($addon::where('unique_identifier', $json['unique_identifier'])->get()) == 0){
                $addon->name = $json['name'];
                $addon->unique_identifier = $json['unique_identifier'];
                $addon->status = 1;
                $addon->school_id = get_settings('selected_branch');
                $addon->save();

                // Run sql modifications
                $sql_path = './addons/' . $unzipped_file_name . '/sql/update.sql';
                if(file_exists($sql_path)){
                    DB::unprepared(file_get_contents($sql_path));
                }

                // Create new directories.
                if (!empty($json['directory'])) {
                    foreach ($json['directory'] as $directory) {
                        if (!is_dir(base_path($directory['name']))){
                            mkdir(base_path($directory['name']), 0777, true);
                        }else {
                            echo "erro on creating directory";
                        }
                    }
                }

                // Create/Replace new files.
                if (!empty($json['files'])) {
                    foreach ($json['files'] as $file)
                        copy($file['root_directory'], base_path($file['update_directory']));
                }

                flash('Addon installed Successfully')->success();
                return redirect()->route('addon_manager.index');

            }else {

                flash('This addon is already installed')->error();
                return redirect()->route('addon_manager.index');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Addon  $addon
     * @return \Illuminate\Http\Response
     */
    public function show(Addon $addon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Addon  $addon
     * @return \Illuminate\Http\Response
     */
    public function edit(Addon $addon)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Addon  $addon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Addon $addon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Addon  $addon
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
