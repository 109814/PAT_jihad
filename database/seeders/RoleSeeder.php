<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // pengguna
        Permission::create(['name'=>'tambahPengguna']);
        Permission::create(['name'=>'editPengguna']);
        Permission::create(['name'=>'deletePengguna']);
        // menu
        Permission::create(['name'=>'tambahMenu']);
        Permission::create(['name'=>'editMenu']);
        Permission::create(['name'=>'deleteMenu']);
        // kasir
        Permission::create(['name'=>'belanja']);
        // kasih permission
        $rolesuperadmin = Role::findByName('admin');
        $rolesuperadmin->givePermissionTo('tambahPengguna');
        $rolesuperadmin->givePermissionTo('editPengguna');
        $rolesuperadmin->givePermissionTo('deletePengguna');
        $rolesuperadmin = Role::findByName('manajer');
        $rolesuperadmin->givePermissionTo('tambahMenu');
        $rolesuperadmin->givePermissionTo('editMenu');
        $rolesuperadmin->givePermissionTo('deleteMenu');
    }
}
