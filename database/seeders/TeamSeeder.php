<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // inserting team
        $teams = [
            ['name' => "Shashank Mishra","designation" => "CEO", "bio" => "This is the test bio", "image" => "team1.png", "portfolio_website" => "https://www.google.com/", "linkedIn_profile" => "https://www.linkedin.com/", "facebook_profile" => "https://www.facebook.com/", "x_profile" => "twitter.com", "youtube_profile" => "https://www.youtube.com/"],
            ['name' => "Shashank Mishra", "designation" => "CEO", "bio" => "This is the test bio", "image" => "team1.png", "portfolio_website" => "https://www.google.com/", "linkedIn_profile" => "https://www.linkedin.com/", "facebook_profile" => "https://www.facebook.com/", "x_profile" => "twitter.com", "youtube_profile" => "https://www.youtube.com/"],
            ['name' => "Shashank Mishra", "designation" => "CEO", "bio" => "This is the test bio", "image" => "team1.png", "portfolio_website" => "https://www.google.com/", "linkedIn_profile" => "https://www.linkedin.com/", "facebook_profile" => "https://www.facebook.com/", "x_profile" => "twitter.com", "youtube_profile" => "https://www.youtube.com/"],
            ['name' => "Shashank Mishra", "designation" => "CEO", "bio" => "This is the test bio", "image" => "team1.png", "portfolio_website" => "https://www.google.com/", "linkedIn_profile" => "https://www.linkedin.com/", "facebook_profile" => "https://www.facebook.com/", "x_profile" => "twitter.com", "youtube_profile" => "https://www.youtube.com/"],
            ['name' => "Shashank Mishra", "designation" => "CEO", "bio" => "This is the test bio", "image" => "team1.png", "portfolio_website" => "https://www.google.com/", "linkedIn_profile" => "https://www.linkedin.com/", "facebook_profile" => "https://www.facebook.com/", "x_profile" => "twitter.com", "youtube_profile" => "https://www.youtube.com/"],
            ['name' => "Shashank Mishra","designation" => "CEO", "bio" => "This is the test bio", "image" => "team1.png", "portfolio_website" => "https://www.google.com/", "linkedIn_profile" => "https://www.linkedin.com/", "facebook_profile" => "https://www.facebook.com/", "x_profile" => "twitter.com", "youtube_profile" => "https://www.youtube.com/"],
            ['name' => "Shashank Mishra","designation" => "CEO", "bio" => "This is the test bio", "image" => "team1.png", "portfolio_website" => "https://www.google.com/", "linkedIn_profile" => "https://www.linkedin.com/", "facebook_profile" => "https://www.facebook.com/", "x_profile" => "twitter.com", "youtube_profile" => "https://www.youtube.com/"],
            ['name' => "Shashank Mishra", "designation" => "CEO", "bio" => "This is the test bio", "image" => "team1.png", "portfolio_website" => "https://www.google.com/", "linkedIn_profile" => "https://www.linkedin.com/", "facebook_profile" => "https://www.facebook.com/", "x_profile" => "twitter.com", "youtube_profile" => "https://www.youtube.com/"],
            ['name' => "Shashank Mishra", "designation" => "CEO", "bio" => "This is the test bio", "image" => "team1.png", "portfolio_website" => "https://www.google.com/", "linkedIn_profile" => "https://www.linkedin.com/", "facebook_profile" => "https://www.facebook.com/", "x_profile" => "twitter.com", "youtube_profile" => "https://www.youtube.com/"],
        ];

        foreach($teams as $team){
            Team::create($team);
        }
    }
}
