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

        // inserting team
        $teams = [
            ['name' => "Shashank Mishra","email" => "shashank@gmail.com", "email_verified_at" => Carbon::now(), "password" => Hash::make("1234qwer"), "designation" => "CEO", "bio" => "This is the test bio", "image" => "team1.png", "portfolio_website" => "https://www.google.com/", "linkedIn_profile" => "https://www.linkedin.com/", "facebook_profile" => "https://www.facebook.com/", "x_profile" => "twitter.com", "youtube_profile" => "https://www.youtube.com/"],
            ['name' => "Shashank Mishra","email" => "shashank1@gmail.com", "email_verified_at" => Carbon::now(), "password" => Hash::make("1234qwer"), "designation" => "CEO", "bio" => "This is the test bio", "image" => "team1.png", "portfolio_website" => "https://www.google.com/", "linkedIn_profile" => "https://www.linkedin.com/", "facebook_profile" => "https://www.facebook.com/", "x_profile" => "twitter.com", "youtube_profile" => "https://www.youtube.com/"],
            ['name' => "Shashank Mishra","email" => "shashank2@gmail.com", "email_verified_at" => Carbon::now(), "password" => Hash::make("1234qwer"), "designation" => "CEO", "bio" => "This is the test bio", "image" => "team1.png", "portfolio_website" => "https://www.google.com/", "linkedIn_profile" => "https://www.linkedin.com/", "facebook_profile" => "https://www.facebook.com/", "x_profile" => "twitter.com", "youtube_profile" => "https://www.youtube.com/"],
            ['name' => "Shashank Mishra","email" => "shashank4@gmail.com", "email_verified_at" => Carbon::now(), "password" => Hash::make("1234qwer"), "designation" => "CEO", "bio" => "This is the test bio", "image" => "team1.png", "portfolio_website" => "https://www.google.com/", "linkedIn_profile" => "https://www.linkedin.com/", "facebook_profile" => "https://www.facebook.com/", "x_profile" => "twitter.com", "youtube_profile" => "https://www.youtube.com/"],
            ['name' => "Shashank Mishra","email" => "shashank5@gmail.com", "email_verified_at" => Carbon::now(), "password" => Hash::make("1234qwer"), "designation" => "CEO", "bio" => "This is the test bio", "image" => "team1.png", "portfolio_website" => "https://www.google.com/", "linkedIn_profile" => "https://www.linkedin.com/", "facebook_profile" => "https://www.facebook.com/", "x_profile" => "twitter.com", "youtube_profile" => "https://www.youtube.com/"],
            ['name' => "Shashank Mishra","email" => "shashan6@gmail.com", "email_verified_at" => Carbon::now(), "password" => Hash::make("1234qwer"), "designation" => "CEO", "bio" => "This is the test bio", "image" => "team1.png", "portfolio_website" => "https://www.google.com/", "linkedIn_profile" => "https://www.linkedin.com/", "facebook_profile" => "https://www.facebook.com/", "x_profile" => "twitter.com", "youtube_profile" => "https://www.youtube.com/"],
            ['name' => "Shashank Mishra","email" => "shashan7@gmail.com", "email_verified_at" => Carbon::now(), "password" => Hash::make("1234qwer"), "designation" => "CEO", "bio" => "This is the test bio", "image" => "team1.png", "portfolio_website" => "https://www.google.com/", "linkedIn_profile" => "https://www.linkedin.com/", "facebook_profile" => "https://www.facebook.com/", "x_profile" => "twitter.com", "youtube_profile" => "https://www.youtube.com/"],
            ['name' => "Shashank Mishra","email" => "shashank8@gmail.com", "email_verified_at" => Carbon::now(), "password" => Hash::make("1234qwer"), "designation" => "CEO", "bio" => "This is the test bio", "image" => "team1.png", "portfolio_website" => "https://www.google.com/", "linkedIn_profile" => "https://www.linkedin.com/", "facebook_profile" => "https://www.facebook.com/", "x_profile" => "twitter.com", "youtube_profile" => "https://www.youtube.com/"],
            ['name' => "Shashank Mishra","email" => "shashank9@gmail.com", "email_verified_at" => Carbon::now(), "password" => Hash::make("1234qwer"), "designation" => "CEO", "bio" => "This is the test bio", "image" => "team1.png", "portfolio_website" => "https://www.google.com/", "linkedIn_profile" => "https://www.linkedin.com/", "facebook_profile" => "https://www.facebook.com/", "x_profile" => "twitter.com", "youtube_profile" => "https://www.youtube.com/"],
        ];

        foreach($teams as $team){
            $t = User::create($team);
            $t->assignRole("staff");
        }
    }
}
