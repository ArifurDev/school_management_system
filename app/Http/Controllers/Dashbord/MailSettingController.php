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
        $mailLists = MailSetting::all();

        return view('dashbord.MailSetting.index', compact('mailLists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashbord.MailSetting.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'mail_transport' => 'required|string|regex:/^\S*$/u',
            'mail_host' => 'required|string|regex:/^\S*$/u',
            'mail_port' => 'required|numeric|regex:/^\S*$/u',
            'mail_username' => 'required|string|regex:/^\S*$/u',
            'mail_password' => 'required|string|regex:/^\S*$/u',
            'mail_encryption' => 'required|string|regex:/^\S*$/u',
            'mail_from' => 'required|string|regex:/^\S*$/u',
            'mail_from_name' => 'required|regex:/^\S*$/u',
            'status' => 'required|regex:/^\S*$/u',
        ], [
            'mail_transport.required' => 'Please Enter The Mailer',
            'mail_host.required' => 'Please Enter The Host',
            'mail_port.required' => 'Please Enter The Port',
            'mail_username.required' => 'Please Enter The User Name',
            'mail_password.required' => 'Please Enter The Password',
            'mail_encryption.required' => 'Please Enter The Encription',
            'mail_from.required' => 'Please Enter The Address',
            'mail_from_name.required' => 'Please Enter The Address Name',
            'status.required' => 'Select Status',
        ], );

        $setMail = new MailSetting();
        $setMail->mail_transport = $request->mail_transport;
        $setMail->mail_host = $request->mail_host;
        $setMail->mail_port = $request->mail_port;
        $setMail->mail_username = $request->mail_username;
        $setMail->mail_password = $request->mail_password;
        $setMail->mail_encryption = $request->mail_encryption;
        $setMail->mail_from = $request->mail_from;
        $setMail->mail_from_name = $request->mail_from_name;
        $setMail->status = $request->status;
        $setMail->save();

        if ($request->status == 1) {
            MailSetting::Where('status', 1)
                ->where('id', '!=', $setMail->id)
                ->update(['status' => 0]);
            $this->setEnvMailer($setMail);
        }

        Artisan::call('config:clear');

        if ($setMail) {
            return $this->returnMessage('Mail Saved Successfully.', 'success');
        } else {
            return $this->returnMessage('Somthing with wrong', 'error');
        }
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
        $this->setEnv();

        return $this->returnMessage('Settings Has Been Updated Successfully', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MailSetting $mailSetting)
    {
        //
    }

    public function setEnvMailer($data)
    {
        $envFile = app()->environmentFilePath();
        $content = file_get_contents($envFile);

        $replacements = [
            'MAIL_MAILER' => $data->mail_transport,
            'MAIL_HOST' => $data->mail_host,
            'MAIL_PORT' => $data->mail_port,
            'MAIL_USERNAME' => $data->mail_username,
            'MAIL_PASSWORD' => $data->mail_password,
            'MAIL_ENCRYPTION' => $data->mail_encryption,
            'MAIL_FROM_ADDRESS' => $data->mail_from,
            'MAIL_FROM_NAME' => $data->mail_from_name,
        ];

        foreach ($replacements as $key => $newValue) {
            $content = preg_replace("/^{$key}=.*/m", "{$key}={$newValue}", $content);
        }

        file_put_contents($envFile, $content);

    }
}
