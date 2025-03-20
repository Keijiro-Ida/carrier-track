<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AspirationLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('aspiration_levels')->insert([
            ['level' => '第一志望', 'priority' => 1],
            ['level' => '第二志望', 'priority' => 2],
            ['level' => '第三志望', 'priority' => 3],
        ]);
    }
}
