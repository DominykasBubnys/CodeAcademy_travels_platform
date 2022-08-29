<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Models\Place;
use App\Models\Comment;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // User::factory(1)->create(
        //     [
        //         'email' => 'test@test.com',
        //         'password' => Hash::make('hello'),
        //         'country' => "Italy",
        //         'image'=> 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSXanJlp8fSM6vn8JGF8Oym7VnL3GkBA8Xu2QN3TYD3dDzhE8Nc'
        //     ]
        // );

        // User::factory(1)->create(
        //     [
        //         'email' => 'test@test2.com',
        //         'password' => Hash::make('hello2'),
        //         'country' => "Poland",
        //         'image'=> 'https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSXanJlp8fSM6vn8JGF8Oym7VnL3GkBA8Xu2QN3TYD3dDzhE8Nc'
        //     ]
        // );

        $user = new User();
        $user->email='test@test2.com';
        $user->name="Tomas";
        $user->password=Hash::make('hello');
        $user->country="Amerika";
        $user->image='https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSXanJlp8fSM6vn8JGF8Oym7VnL3GkBA8Xu2QN3TYD3dDzhE8Nc';
        $user->save();

        $place = new Place();
        $place->title = "new title";
        $place->description = "new description";
        $place->author_id = 1;
        $place->image="https://encrypted-tbn2.gstatic.com/images?q=tbn:ANd9GcSXanJlp8fSM6vn8JGF8Oym7VnL3GkBA8Xu2QN3TYD3dDzhE8Nc";
        $place->address="NewYork";
        $place->likes=0;
        $place->save();

        $comment1 = new Comment();
        $comment1->body = "Testing...";
        $comment1->user()->associate($user);

        $place->comments()->save($comment1);
        $comment1->save();
        

    }
}
