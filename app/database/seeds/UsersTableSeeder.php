<?php

/**
 * Created by PhpStorm.
 * User: garyobrien
 * Date: 26/02/2016
 * Time: 22:30
 */

class UsersTableSeeder extends Seeder
{
    public function run()
    {

        DB::table('users')->delete();

        User::create([
            'first_name' => 'Suzi',
            'last_name' => 'Kelly',
            'address' => '141 Hillsdale Syndey',
            'role' => 'Admin',
            'telephone' => '0123456789',
            'email' => 'suzi@gmail.com',
            'password' => Hash::make('suzi'),
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        User::create([
            'first_name' => 'Gary',
            'last_name' => 'O Brien',
            'address' => '141 Deerpark Cork',
            'role' => 'Barber',
            'telephone' => '0857685205',
            'email' => 'gary92@gmail.com',
            'password' => Hash::make('gary92'),
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        User::create([
            'first_name' => 'Dan',
            'last_name' => 'O Brien',
            'address' => '141 Syndey',
            'role' => 'Intern',
            'telephone' => '0877777775',
            'email' => 'dan@gmail.com',
            'password' => Hash::make('danob'),
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        User::create([
            'first_name' => 'Ian',
            'last_name' => 'O Brien',
            'address' => '141 Hills Cork',
            'telephone' => '0877777775',
            'email' => 'ian@gmail.com',
            'password' => Hash::make('ianob'),
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        User::create([
            'first_name' => 'John',
            'last_name' => 'O Brien',
            'address' => '141 Deerpark Cork',
            'telephone' => '0872789117',
            'email' => 'john@gmail.com',
            'password' => Hash::make('john'),
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);
    }
}