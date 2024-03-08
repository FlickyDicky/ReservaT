<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        //\App\Models\Usuario::factory(10)->create();
        //\App\Models\Empresa::factory(10)->create();
//
        //\App\Models\Horario::factory(10)->create();

        /*aquí tenemos un seed concreto para un insert de prueba hehe*/
        DB::table('usuarios')->insert([
            'nombre' => 'ryan',
            'apellidos' => 'admin',
            'email' => 'ryan@admin.com',
            'telefono' => '123456789',
            'direccion' => 'Dirección de prueba',
            'municipio' => 'Municipio de prueba',
            'tipo' => 'E',
            'password' => Hash::make('admin'), // password = admin. Hash::make() is a helper function to hash the password before saving it to the database. It uses bcrypt() by default.
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('usuarios')->insert([
            'nombre' => 'admin',
            'apellidos' => 'admin',
            'email' => 'admin@admin.com',
            'telefono' => '123456789',
            'direccion' => 'Dirección de prueba',
            'municipio' => 'Municipio de prueba',
            'tipo' => 'C',
            'password' => Hash::make('admin'), // password = admin. Hash::make() is a helper function to hash the password before saving it to the database. It uses bcrypt() by default.
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
