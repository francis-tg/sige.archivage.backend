<?php

namespace Database\Seeders;

use App\Models\PersRole;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PersRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PersRole::factory()->count(3)->create();
    }
}
