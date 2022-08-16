<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Place;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        User::factory(1)->create(
            [
                'email' => 'test@test.com',
                'password' => Hash::make('hello'),
                'country' => "Italy",
                'image'=> 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSXanJlp8fSM6vn8JGF8Oym7VnL3GkBA8Xu2QN3TYD3dDzhE8Nc'
            ]
        );

        User::factory(1)->create(
            [
                'email' => 'test@test2.com',
                'password' => Hash::make('hello2'),
                'country' => "Poland",
                'image'=> 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSXanJlp8fSM6vn8JGF8Oym7VnL3GkBA8Xu2QN3TYD3dDzhE8Nc'
            ]
        );

        

    }
}
