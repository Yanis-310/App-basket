<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConferenceSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('conferences')->insert([
            ['name' => 'Est', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ouest', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
