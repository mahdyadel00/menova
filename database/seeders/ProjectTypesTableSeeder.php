<?php

namespace Database\Seeders;

use App\Models\ProjectType;
use Illuminate\Database\Seeder;

class ProjectTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ProjectType::create(['en' => ['name' => 'Software'], 'ar' => ['name' => 'السوفت وير']]);
        ProjectType::create(['en' => ['name' => 'E-Commerce'], 'ar' => ['name' => 'التجارة الالكترونية']]);
    }
}