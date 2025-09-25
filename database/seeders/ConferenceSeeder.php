<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Conference;

class ConferenceSeeder extends Seeder
{
    public function run()
    {
        Conference::create(['name' => 'Conférence Est']);
        Conference::create(['name' => 'Conférence Ouest']);
    }
}
