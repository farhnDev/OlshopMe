<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run(): void
    {
        if (!Role::where('name', 'admin')->first()) {
            Role::create(['name' => 'admin']);
        }
    }
}
