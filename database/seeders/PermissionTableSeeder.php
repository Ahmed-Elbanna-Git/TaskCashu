<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $permissions = [
         //user permissions
            'user create',
            'user delete',
            'user show',
            'user edit',

            //Role permissions
            'role create',
            'role delete',
            'role show',
            'role edit',

            //Sales permissions
            'sales create',
            'sales delete',
            'sales show',
            'sales edit',

            //Settings permissions
            'settings create',
            'settings delete',
            'settings show',
            'settings edit',



        ];



        foreach ($permissions as $permission) {

            Permission::create(['name' => $permission]);
        }
    }
}
