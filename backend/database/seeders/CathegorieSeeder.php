<?php

namespace Database\Seeders;

use App\Models\Cathegorie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CathegorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cathegorie::factory()->count(15)->create();
    }
}
