<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TechnologyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('technology_categories')->insert([
            ['name' => 'プログラミング言語'],
            ['name' => 'インフラ'],
            ['name' => 'クラウドサービス'],
            ['name' => 'フレームワーク'],
        ]);
    }
}
