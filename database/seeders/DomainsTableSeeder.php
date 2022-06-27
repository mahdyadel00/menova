<?php

namespace Database\Seeders;

use App\Models\Domain;
use Illuminate\Database\Seeder;

class DomainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Domain::create(['en' => ['name' => 'Programming'], 'ar' => ['name' => 'البرمجة']]);
        Domain::create(['en' => ['name' => 'Agriculture'], 'ar' => ['name' => 'الزراعة']]);
        Domain::create(['en' => ['name' => 'Commerce'], 'ar' => ['name' => 'التجارة']]);
        Domain::create(['en' => ['name' => 'Education'], 'ar' => ['name' => 'التعليم']]);
    }
}