<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        Permission::create(['name' => 'read user']);
        Permission::create(['name' => 'create user']);
        Permission::create(['name' => 'update user']);
        Permission::create(['name' => 'delete user']);

        Permission::create(['name' => 'read role']);
        Permission::create(['name' => 'create role']);
        Permission::create(['name' => 'update role']);
        Permission::create(['name' => 'delete role']);

        Permission::create(['name' => 'read monev pdam']);
        Permission::create(['name' => 'create monev pdam']);
        Permission::create(['name' => 'update monev pdam']);
        Permission::create(['name' => 'delete monev pdam']);

        Permission::create(['name' => 'read kinerja pdam']);
        Permission::create(['name' => 'create kinerja pdam']);
        Permission::create(['name' => 'update kinerja pdam']);
        Permission::create(['name' => 'delete kinerja pdam']);

        Permission::create(['name' => 'read laporan pdam']);
        Permission::create(['name' => 'create laporan pdam']);
        Permission::create(['name' => 'update laporan pdam']);
        Permission::create(['name' => 'delete laporan pdam']);

        Permission::create(['name' => 'read laporan triwulan pdam']);
        Permission::create(['name' => 'create laporan triwulan pdam']);
        Permission::create(['name' => 'update laporan triwulan pdam']);
        Permission::create(['name' => 'delete laporan triwulan pdam']);

        // create roles and assign created permissions
        // this can be done as separate statements
        $evaluator = Role::create(['name' => 'Evaluator']);
        $evaluator->syncPermissions(
            [
                'read monev pdam', 'create monev pdam', 'update monev pdam', 'delete monev pdam',
                'read laporan pdam', 'create laporan pdam', 'update laporan pdam', 'delete laporan pdam',
                'read laporan triwulan pdam', 'create laporan triwulan pdam', 'update laporan triwulan pdam', 'delete laporan triwulan pdam',
                'read kinerja pdam', 'create kinerja pdam', 'update kinerja pdam', 'delete kinerja pdam',
                'read user', 'create user',
            ]
        );

        $eksekutif = Role::create(['name' => 'Eksekutif']);
        $eksekutif->syncPermissions(
            [
                'read monev pdam',
                'read laporan pdam',
                'read laporan triwulan pdam',
                'read kinerja pdam',
            ]
        );

        $pdam = Role::create(['name' => 'Operator PDAM']);
        $pdam->syncPermissions(
            [
                'read monev pdam',
                'read laporan pdam', 'create laporan pdam', 'update laporan pdam',
                'read kinerja pdam', 'create kinerja pdam', 'update kinerja pdam',
                'read laporan triwulan pdam', 'create laporan triwulan pdam', 'update laporan triwulan pdam',

            ]
        );


        $role = Role::create(['name' => 'Administrator']);
        $role->givePermissionTo(Permission::all());
    }
}
