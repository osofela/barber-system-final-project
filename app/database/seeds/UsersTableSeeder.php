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
        User::create([
            'email' => 'gary92@gmail.com',
            'password' => Hash::make('gary92'),
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);
    }
}