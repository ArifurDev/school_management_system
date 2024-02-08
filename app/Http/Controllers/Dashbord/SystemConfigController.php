<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Dashbord\BaseController as BaseController;
use App\Models\SystemConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class SystemConfigController extends BaseController
{
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
        return view('dashbord.systemSetting.setting');
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
    public function update(Request $request, SystemConfig $systemConfig)
    {
        //
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
        // switch ($request->command) {
        //     case 'db':
        //         Artisan::call('backup:run --only-db');
        //         return $this->returnMessage('Backup MySQL file', 'success');
        //     break;
        //     case 'file':
        //         Artisan::call('backup:run --only-files');
        //         return $this->returnMessage('Backup Project File', 'success');
        //     break;
        //     case 'both':
        //         Artisan::call('backup:run');
        //         return $this->returnMessage('Backup MySQL and Project Flie', 'success');
        //     break;

        //     default:
        //         return $this->returnMessage('Somting with wrong', 'error');
        //         break;
        // }

        if ($request->command == 'db') {
            Artisan::call('backup:run --only-db');

            return $this->returnMessage('Backup MySQL file', 'success');
        } elseif ($request->command == 'file') {
            Artisan::call('backup:run --only-files');

            return $this->returnMessage('Backup Project File', 'success');
        } elseif ($request->command == 'both') {
            Artisan::call('backup:run');

            return $this->returnMessage('Backup MySQL and Project Flie', 'success');
        } else {
            return $this->returnMessage('Somting with wrong', 'error');
        }

    }
}
