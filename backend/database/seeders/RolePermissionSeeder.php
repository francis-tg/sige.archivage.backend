<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\RolePermission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Example: Associating permissions with roles
        RolePermission::create([
            'code_role' => 'admin', // Example role code
        ]);

        RolePermission::create([
            'code_role' => 'editor',
        ]);

        RolePermission::create([
            'code_permis' => 'view_reports',
            'code_role' => 'viewer',
        ]);

        // Add more role permission associations as needed
    }
}
