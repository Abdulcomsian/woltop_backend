<?php

namespace Database\Seeders;

use App\Models\Faq;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faqs = [
            ["user_id" => 1, "question" => "Maecenas efficitur scelerisque lorem?", "answer" => "Nillam bibendum diam diam, maximus malesuada tortor volutpat sit amet. Curabitur volutpat feugiat tellus, sit amet faucibus massa vulputate lobortis. Vestibulum malesuada ex dolor,"],
            ["user_id" => 1, "question" => "Pellentesque ultricies nulla sit amet ipsum kra pellentesque?", "answer" => "Nillam bibendum diam diam, maximus malesuada tortor volutpat sit amet. Curabitur volutpat feugiat tellus, sit amet faucibus massa vulputate lobortis. Vestibulum malesuada ex dolor,"],
            ["user_id" => 1, "question" => "Nullam bibendum diam diam, maximus malesuada?", "answer" => "Nillam bibendum diam diam, maximus malesuada tortor volutpat sit amet. Curabitur volutpat feugiat tellus, sit amet faucibus massa vulputate lobortis. Vestibulum malesuada ex dolor,"],
            ["user_id" => 1, "question" => "Vivamus eleifend nec felis vel auctor?", "answer" => "Nillam bibendum diam diam, maximus malesuada tortor volutpat sit amet. Curabitur volutpat feugiat tellus, sit amet faucibus massa vulputate lobortis. Vestibulum malesuada ex dolor,"],
            ["user_id" => 1, "question" => "Vivamus eleifend nec felis vel auctor?", "answer" => "Nillam bibendum diam diam, maximus malesuada tortor volutpat sit amet. Curabitur volutpat feugiat tellus, sit amet faucibus massa vulputate lobortis. Vestibulum malesuada ex dolor,"],
        ];

        foreach($faqs as $faq){
            Faq::create($faq);
        }
    }
}
