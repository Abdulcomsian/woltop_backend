<?php

namespace Database\Seeders;

use App\Enums\JobLevel;
use App\Enums\JobType;
use App\Models\Career;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CareerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $jobs = [
            ["title" => "Business Analyst", "description" => "This is the test description", "job_link" => "https://www.linkedin.com/feed/", "level" => JobLevel::MID, "job_type" => JobType::FULL_TIME, "location" => "USA"],
            ["title" => "Front End Developer (Flutter)", "description" => "This is the test description", "job_link" => "https://www.linkedin.com/feed/", "level" => JobLevel::MID, "job_type" => JobType::FULL_TIME, "location" => "UK"],
            ["title" => "Back End Developer (Node JS)", "description" => "This is the test description", "job_link" => "https://www.linkedin.com/feed/", "level" => JobLevel::MID, "job_type" => JobType::FULL_TIME, "location" => "USA"],
            ["title" => "Marketing Analyst", "description" => "This is the test description", "job_link" => "https://www.linkedin.com/feed/", "level" => JobLevel::MID, "job_type" => JobType::FULL_TIME, "location" => "Finland"],
            ["title" => "Machine Learning", "description" => "This is the test description", "job_link" => "https://www.linkedin.com/feed/", "level" => JobLevel::MID, "job_type" => JobType::FULL_TIME, "location" => "USA"],
            ["title" => "Deep Learning Engineer", "description" => "This is the test description", "job_link" => "https://www.linkedin.com/feed/", "level" => JobLevel::MID, "job_type" => JobType::FULL_TIME, "location" => "Austria"],
        ];

        foreach($jobs as $job){
            Career::create($job);
        }
    }
}
