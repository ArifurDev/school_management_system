<?php

namespace Database\Seeders;

use App\Models\MailSetting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class MailSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MailSetting::create([
            'mail_transport' => 'smtp',
            'mail_host' => 'sandbox.smtp.mailtrap.io',
            'mail_port' => '2525',
            'mail_username' => '0c1c23b9104538',
            'mail_password' => '0c1c23b9104538',
            'mail_encryption' => 'tls',
            'mail_from' => 'arifurrahmanrifat72@gmail.com',
        ]);
        Artisan::call('config:clear');
    }
}
