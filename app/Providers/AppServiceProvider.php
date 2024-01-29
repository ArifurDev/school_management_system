<?php

namespace App\Providers;

use App\Models\MailSetting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $mailSetting = MailSetting::first();
        if ($mailSetting) {
            $data = [
                'driver' => $mailSetting->mail_transport,
                'host' => $mailSetting->mail_host,
                'port' => $mailSetting->mail_port,
                'encryption' => $mailSetting->mail_encryption,
                'username' => $mailSetting->mail_username,
                'password' => $mailSetting->mail_password,
                'from' => [
                    'address' => $mailSetting->mail_from,
                    'name' => 'School Management',
                ],
            ];
            Config::set('mail', $data);
        }
    }
}
