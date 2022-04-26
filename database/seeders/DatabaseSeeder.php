<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\PlayerSeeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(PlayerSeeder::class);
    }
}
