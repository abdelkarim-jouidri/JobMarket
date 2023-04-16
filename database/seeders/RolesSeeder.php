<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'employer',
            'candidate',
        ];
        
        Role::insert(array_map(function ($role) {
            return ['name' => $role];
        }, $roles));
    }
}
