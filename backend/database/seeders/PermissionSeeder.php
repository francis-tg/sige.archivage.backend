<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create([
            'label_permis' => 'Manage Users',
        ]);

        Permission::create([
            'label_permis' => 'Edit Documents',
        ]);

        Permission::create([
            'label_permis' => 'View Reports',
        ]);

        // Add more permissions as needed
    }
}
