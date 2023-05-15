<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\User::create([
            'nama_petugas' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@a.com',
            'password' => Hash::make('12341234'),
            'level' => 'admin'
        ]);
        \App\Models\User::create([
            'nama_petugas' => 'Petugas',
            'username' => 'petugas',
            'email' => 'petugas@a.com',
            'password' => Hash::make('12341234'),
            'level' => 'petugas'
        ]);
    }
}
