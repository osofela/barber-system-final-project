<?php

/**
 * Created by PhpStorm.
 * User: garyobrien
 * Date: 04/03/2016
 * Time: 20:31
 */
class AppointmentsTableSeeder extends Seeder
{

    public function run()
    {

        DB::table('appointments')->delete();

        Appointment::create([
            'user_id' => '3',
            'barber_id' => '1',
            'haircut_type' => 'Wet Cut',
            'music_choice' => 'Drake',
            'drink_choice' => 'Tea',
            'date' => \Carbon\Carbon::now(),
            'start_time' => \Carbon\Carbon::now()->toDateTimeString(),
            'end_time' => \Carbon\Carbon::now()->toDateTimeString(),
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        Appointment::create([
            'user_id' => '4',
            'barber_id' => '2',
            'haircut_type' => 'Dry Cut',
            'music_choice' => 'Logic',
            'drink_choice' => 'Coke Cola',
            'date' => \Carbon\Carbon::now(),
            'start_time' => \Carbon\Carbon::now()->toDateTimeString(),
            'end_time' => \Carbon\Carbon::now()->toDateTimeString(),
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        Appointment::create([
            'user_id' => '4',
            'barber_id' => '1',
            'haircut_type' => 'Wet Cut & Shave',
            'music_choice' => 'J Cole',
            'drink_choice' => 'Coffee',
            'date' => \Carbon\Carbon::now(),
            'start_time' => \Carbon\Carbon::now()->toDateTimeString(),
            'end_time' => \Carbon\Carbon::now()->toDateTimeString(),
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        Appointment::create([
            'user_id' => '3',
            'barber_id' => '1',
            'haircut_type' => 'Wet Cut & Shave',
            'music_choice' => 'J Cole',
            'drink_choice' => 'Coffee',
            'date' => \Carbon\Carbon::now(),
            'start_time' => \Carbon\Carbon::now()->toDateTimeString(),
            'end_time' => \Carbon\Carbon::now()->toDateTimeString(),
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);

    }
}