<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('applications')->insert([
            [
                'company_id' => 1,
                'position' => 'Webエンジニア',
                'attraction' => '社風が良さそうです。',
                'concerns' => '残業が多いかもしれません。',
                'aspiration_level_id' => 1,
                'status_id' => 1,
                'final_status_id' => 1,
                'comment' => '書類選考中です。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id' => 2,
                'position' => 'フロントエンドエンジニア',
                'attraction' => '社風が良さそうです。',
                'concerns' => '残業が多いかもしれません。',
                'aspiration_level_id' => 1,
                'status_id' => 1,
                'final_status_id' => 1,
                'comment' => '書類選考中です。',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id' => 3,
                'position' => 'バックエンドエンジニア',
                'attraction' => '社風が良さそうです。',
                'concerns' => '残業が多いかもしれません。',
                'aspiration_level_id' => 1,
                'status_id' => 1,
                'final_status_id' => 1,
                'comment' => '書類選考中です。',
                'created_at' => now(),
                'updated_at' => now(),
            ],

        ]);

    }
}
