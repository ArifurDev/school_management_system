<?php

namespace Database\Seeders;

use App\Models\SystemConfig as ModelsSystemConfig;
use Illuminate\Database\Seeder;

class systemConfig extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ModelsSystemConfig::create([
            'site_name' => 'enter name',
            'site_description' => 'enter  description',
        ]);
    }
}
