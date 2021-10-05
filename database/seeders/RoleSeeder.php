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
            'name' => 'Admin',
            'description' => null,
            'access_level' => 6,
        ]);

        Role::create([
            'name' => 'MD',
            'description' => null,
            'access_level' => 5,
        ]);

        Role::create([
            'name' => 'SCM Head',
            'description' => null,
            'access_level' => 4,
        ]);

        Role::create([
            'name' => 'Business Head',
            'description' => null,
            'access_level' => 4,
        ]);

        Role::create([
            'name' => 'Technical Head',
            'description' => null,
            'access_level' => 4,
        ]);

        Role::create([
            'name' => 'General Head',
            'description' => null,
            'access_level' => 4,
        ]);

        Role::create([
            'name' => 'Accounts Head',
            'description' => null,
            'access_level' => 4,
        ]);

        Role::create([
            'name' => 'SCM Staff',
            'description' => null,
            'access_level' => 3,
        ]);

        Role::create([
            'name' => 'Business Staff',
            'description' => null,
            'access_level' => 3,
        ]);

        Role::create([
            'name' => 'Technical Staff',
            'description' => null,
            'access_level' => 3,
        ]);

        Role::create([
            'name' => 'General Staff',
            'description' => null,
            'access_level' => 3,
        ]);

        Role::create([
            'name' => 'Accounts Staff',
            'description' => null,
            'access_level' => 3,
        ]);

        Role::create([
            'name' => 'Storhouse',
            'description' => null,
            'access_level' => 2,
        ]);

        Role::create([
            'name' => 'Bank',
            'description' => null,
            'access_level' => 2,
        ]);
    }
}
