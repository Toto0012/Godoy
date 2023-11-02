<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $role1 = Role::create(['name' => 'Admin']);

       Permission::create(['name' => 'admin.home'])->assignRole($role1);
       Permission::create(['name' => 'admin.usuarios.index'])->assignRole($role1);
       Permission::create(['name' => 'admin.usuarios.create'])->assignRole($role1);
       Permission::create(['name' => 'admin.usuarios.edit'])->assignRole($role1);
       Permission::create(['name' => 'admin.usuarios.destroy'])->assignRole($role1);
       //Si queremos compartir permisos a varios roles debnemos de poenr syncRoles([])


    }
}
