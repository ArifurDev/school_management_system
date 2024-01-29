<?php

namespace App\Http\Controllers\Dashbord;

use App\Http\Controllers\Dashbord\BaseController as BaseController;
use App\Models\MailSetting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class MailSettingController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mail = MailSetting::first();

        return view('dashbord.MailSetting.Mail', compact('mail'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(MailSetting $mailSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MailSetting $mailSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MailSetting $mailsetting)
    {
        $request->validate([
            'mail_transport' => 'required|string|regex:/^\S*$/u',
            'mail_host' => 'required|string|regex:/^\S*$/u',
            'mail_port' => 'required|numeric|regex:/^\S*$/u',
            'mail_username' => 'required|string|regex:/^\S*$/u',
            'mail_password' => 'required|string|regex:/^\S*$/u',
            'mail_encryption' => 'required|string|regex:/^\S*$/u',
            'mail_from' => 'required|string|regex:/^\S*$/u',
        ], [
            'mail_transport.required' => 'Please Enter The Mailer',
            'mail_host.required' => 'Please Enter The Host',
            'mail_port.required' => 'Please Enter The Port',
            'mail_username.required' => 'Please Enter The User Name',
            'mail_password.required' => 'Please Enter The Password',
            'mail_encryption.required' => 'Please Enter The Encription',
            'mail_from.required' => 'Please Enter The Address',
        ], );

        $mailsetting->update([
            'mail_transport' => $request->mail_transport,
            'mail_host' => $request->mail_host,
            'mail_port' => $request->mail_port,
            'mail_username' => $request->mail_username,
            'mail_password' => bcrypt($request->mail_password),
            'mail_encryption' => $request->mail_encryption,
            'mail_from' => $request->mail_from,
            'updated_at' => Carbon::now(),
        ]);
        Artisan::call('config:clear');

        return $this->returnMessage('Settings Has Been Updated Successfully', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MailSetting $mailSetting)
    {
        //
    }
}
