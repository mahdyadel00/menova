<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Topic::create([
            'en' => ['name' => 'Programming'],
            'ar' => ['name' => 'البرمجة'],
        ]);

        Topic::create([
            'en' => ['name' => 'E-Commerce'],
            'ar' => ['name' => 'التجارة الالكترونية'],
        ]);

        Topic::create([
            'en' => ['name' => 'Email Verification'],
            'ar' => ['name' => 'تفعيل الايميلات'],
        ]);
    }
}