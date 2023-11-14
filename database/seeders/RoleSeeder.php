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
       $role2 = Role::create(['name' => 'Mesero']);
       $role3 = Role::create(['name' => 'Encargado']);
       $role4 = Role::create(['name' => 'Cocina']);

       Permission::create(['name' => 'admin.home'])->assignRole($role1);
       Permission::create(['name' => 'admin.usuarios.index'])->assignRole($role1);
       Permission::create(['name' => 'admin.usuarios.create'])->assignRole($role1);
       Permission::create(['name' => 'admin.usuarios.edit'])->assignRole($role1);
       Permission::create(['name' => 'admin.usuarios.destroy'])->assignRole($role1);

       Permission::create(['name' => 'ordenes.home'])->syncRoles([$role1,$role2,$role3]);
       Permission::create(['name' => 'ordenes.index'])->syncRoles([$role1,$role2,$role3]);              
       Permission::create(['name' => 'ordenes.create'])->syncRoles([$role1,$role2,$role3]);
       Permission::create(['name' => 'ordenes.edit'])->syncRoles([$role1,$role2,$role3]);
       Permission::create(['name' => 'ordenes.destroy'])->syncRoles([$role1,$role2,$role3]);

       Permission::create(['name' => 'inventario.home'])->syncRoles([$role1,$role3]);
       Permission::create(['name' => 'inventario.index'])->syncRoles([$role1,$role3]);
       Permission::create(['name' => 'inventario.create'])->syncRoles([$role1,$role3]);
       Permission::create(['name' => 'inventario.edit'])->syncRoles([$role1,$role3]);
       Permission::create(['name' => 'inventario.destroy'])->syncRoles([$role1,$role3]);

       Permission::create(['name' => 'cocina.home'])->syncRoles([$role1,$role4]);
       Permission::create(['name' => 'cocina.index'])->syncRoles([$role1,$role4]);
       Permission::create(['name' => 'cocina.edit'])->syncRoles([$role1,$role4]);
       //Si queremos compartir permisos a varios roles debemos de poner syncRoles([])


    }
}
