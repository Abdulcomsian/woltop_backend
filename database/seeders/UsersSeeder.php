<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Faker\Generator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Generator $faker)
    {
        // inserting admin data into database
        $admin = User::create([
            "name" => "admin",
            "email" => "admin@gmail.com",
            "email_verified_at" => Carbon::now(),
            "password" => Hash::make("admin123"),
        ]);
        $admin->assignRole("admin");

        // inserting users
        $users = [
            ["name" => "User", "email" => "user@gmail.com", "email_verified_at" => Carbon::now(), "password" => Hash::make("1234qwer")],
        ];

        foreach($users as $user){
            $u = User::create($user);
            $u->assignRole('user');
        }
    }
}
