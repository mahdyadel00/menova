<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'first_name' => 'super_admin',
            'email' => 'super_admin@app.com',
            'password' => bcrypt('password'),
            //'role' => 'super_admin',
            'phone' => '0000000000',
            'accept_policy' => 1,
            'email_verified_at' => \now(),
            'domain_id' => null,
        ]);
        $admin->attachRole('super_admin');
        $user = User::create([
            'first_name' => 'Mahmoud',
            'last_name' => 'Sayed',
            'email' => 'm.sayed@gmail.com',
            'password' => bcrypt('P@ssw0rd'),
            'phone' => '0000000000',
            'accept_policy' => 1,
            'email_verified_at' => \now(),
            'domain_id' => null,
        ]);
    } //end of run

}//end of seeder
