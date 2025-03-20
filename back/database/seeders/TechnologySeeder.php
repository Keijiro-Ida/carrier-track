<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TechnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('technologies')->insert([
            ['name' => 'PHP', 'technology_category_id' => 1],
            ['name' => 'Laravel', 'technology_category_id' => 4],
            ['name' => 'Ruby', 'technology_category_id' => 1],
            ['name' => 'Ruby on Rails', 'technology_category_id' => 4],
            ['name' => 'Python', 'technology_category_id' => 1],
            ['name' => 'Django', 'technology_category_id' => 4],
            ['name' => 'Java', 'technology_category_id' => 1],
            ['name' => 'Spring', 'technology_category_id' => 4],
            ['name' => 'C#', 'technology_category_id' => 1],
            ['name' => '.NET', 'technology_category_id' => 4],
            ['name' => 'C++', 'technology_category_id' => 1],
            ['name' => 'Unity', 'technology_category_id' => 4],
            ['name' => 'Swift', 'technology_category_id' => 1],
            ['name' => 'Objective-C', 'technology_category_id' => 1],
            ['name' => 'iOS', 'technology_category_id' => 4],
            ['name' => 'Android', 'technology_category_id' => 4],
            ['name' => 'Kotlin', 'technology_category_id' => 1],
            ['name' => 'Flutter', 'technology_category_id' => 4],
            ['name' => 'Dart', 'technology_category_id' => 1],
            ['name' => 'Rust', 'technology_category_id' => 1],
            ['name' => 'Go', 'technology_category_id' => 1],
            ['name' => 'TypeScript', 'technology_category_id' => 1],
            ['name' => 'JavaScript', 'technology_category_id' => 1],
            ['name' => 'Vue.js', 'technology_category_id' => 4],
            ['name' => 'React', 'technology_category_id' => 4],
            ['name' => 'Angular', 'technology_category_id' => 4],
            ['name' => 'AWS', 'technology_category_id' => 3],
            ['name' => 'GCP', 'technology_category_id' => 3],
            ['name' => 'Azure', 'technology_category_id' => 3],
            ['name' => 'Docker', 'technology_category_id' => 2],
            ['name' => 'Kubernetes', 'technology_category_id' => 2],
            ['name' => 'Linux', 'technology_category_id' => 2],
            ['name' => 'Windows', 'technology_category_id' => 2],
        ]);
    }
}
