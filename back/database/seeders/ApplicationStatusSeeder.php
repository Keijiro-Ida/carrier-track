<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('application_statuses')->insert([
            ['name' => '書類選考中', 'order' => 1],
            ['name' => '面接中', 'order' => 2],
            ['name' => '内定', 'order' => 3],
            ['name' => '不採用', 'order' => 4],
        ]);
    }
}
