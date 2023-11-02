<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Alexander Duarte Garcia',
            'email' => 'toto_300_toto@hotmail.com',
            'password' => bcrypt('12345678')
        ])->assignRole('Admin');
        User::factory(9)->create();
    }
}
