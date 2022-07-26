<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            'admin',
            'siswa'
        ];

        collect($roles)->map(function ($name) {
            Role::query()->updateOrCreate(compact('name'),compact('name'));
        });
    }
}