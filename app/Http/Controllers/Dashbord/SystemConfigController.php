<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Dashbord\BaseController as BaseController;
use App\Models\SystemConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Intervention\Image\Facades\Image;

class SystemConfigController extends BaseController
{
    public function __construct()
    {
        $this->middleware('role_or_permission:System config control', ['only' => ['create', 'update']]);
        $this->middleware('role_or_permission:System config create', ['only' => ['create']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $config = SystemConfig::first();

        return view('dashbord.systemSetting.setting', compact('config'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(SystemConfig $systemConfig)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SystemConfig $systemConfig)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SystemConfig $site_configuration)
    {

        $site_configuration->update([
            'site_name' => $request->site_name,
            'site_description' => $request->site_description,
        ]);

        //image check and upload
        if ($request->hasFile('site_logo')) {
            //product image validation if set image
            $request->validate([
                'site_logo' => 'mimes:png',
            ]);

            if ($site_configuration->site_logo) {
                //delete old image from folder
                unlink(base_path('public/upload/site_image/'.$site_configuration->site_logo));
            }

            //customer image update
            $file_name = time().'.'.$request->file('site_logo')->getClientOriginalExtension();

            $img = Image::make($request->file('site_logo'));
            $img->save(base_path('public/upload/site_image/'.$file_name), 80);

            $site_configuration->update([
                'site_logo' => $file_name,
            ]);

        }

        return $this->returnMessage('Update successfulliy', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SystemConfig $systemConfig)
    {
        //
    }

    //Backup
    public function backup(Request $request)
    {
        switch ($request->command) {
            case 'db':
                Artisan::call('backup:run --only-db');

                return $this->returnMessage('Backup MySQL file', 'success');
                break;
            case 'file':
                Artisan::call('backup:run --only-files');

                return $this->returnMessage('Backup Project File', 'success');
                break;
            case 'both':
                Artisan::call('backup:run');

                return $this->returnMessage('Backup MySQL and Project Flie', 'success');
                break;

            default:
                return $this->returnMessage('Somting with wrong', 'error');
                break;
        }
    }
}
