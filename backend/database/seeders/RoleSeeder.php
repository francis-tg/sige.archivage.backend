<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'label' => 'Administrator',
            'acreditation_role' => 'Full Access',
        ]);

        Role::create([
            'label_role' => 'Editor',
            'acreditation_role' => 'Edit Access',
        ]);

        Role::create([
            'label_role' => 'Viewer',
            'acreditation_role' => 'View Only',
        ]);

        // Add more roles as needed
    }
}
