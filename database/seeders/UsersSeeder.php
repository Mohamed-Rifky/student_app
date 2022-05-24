<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'M. Rifky',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('123456789'),
        ]);
        $admin = User::find(1);
        $admin->assignRole('admin');
    }
}
