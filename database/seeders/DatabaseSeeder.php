<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Place;
use App\Models\User;
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
        // User::factory(3)->create();

        // Place::factory(7)->create();

        // User::factory(1)->has(Place::factory(2))->create();

        // $admin = new User;
        // $admin->name='lopas';
        // $admin->email='lopas@lopas.com';
        // $admin->password = Hash::make('lopas');
        // $admin->save();

        User::factory(1)->create(
            [
                'email' => 'test@test.com',
                'password' => Hash::make('test')
            ]
        );

    }
}
