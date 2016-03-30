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
            'user_id' => '4',
            'barber_id' => '1',
            'haircut_type' => 'Wet Cut',
            'music_choice' => 'Hip Hop/Rap',
            'music_artist' => 'Drake',
            'drink_choice' => 'Tea',
            'appointment_date' => \Carbon\Carbon::now(),
            'start_time' => \Carbon\Carbon::now()->toDateTimeString(),
            'end_time' => \Carbon\Carbon::now()->toDateTimeString(),
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        Appointment::create([
            'user_id' => '4',
            'barber_id' => '2',
            'haircut_type' => 'Dry Cut',
            'music_choice' => 'Hip Hop/Rap',
            'music_artist' => 'Logic',
            'drink_choice' => 'Coke Cola',
            'appointment_date' => \Carbon\Carbon::now(),
            'start_time' => \Carbon\Carbon::now()->toDateTimeString(),
            'end_time' => \Carbon\Carbon::now()->toDateTimeString(),
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        Appointment::create([
            'user_id' => '5',
            'barber_id' => '1',
            'haircut_type' => 'Wet Cut & Hot Towel Shave',
            'music_choice' => 'Hip Hop/Rap',
            'music_artist' => 'J Cole',
            'drink_choice' => 'Coffee',
            'appointment_date' => \Carbon\Carbon::now(),
            'start_time' => \Carbon\Carbon::now()->toDateTimeString(),
            'end_time' => \Carbon\Carbon::now()->toDateTimeString(),
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);

        Appointment::create([
            'user_id' => '5',
            'barber_id' => '1',
            'haircut_type' => 'Wet Cut & Hot Towel Shave',
            'music_choice' => 'Hip Hop/Rap',
            'music_artist' => 'J Cole',
            'drink_choice' => 'Coffee',
            'appointment_date' => \Carbon\Carbon::now(),
            'start_time' => \Carbon\Carbon::now()->toDateTimeString(),
            'end_time' => \Carbon\Carbon::now()->toDateTimeString(),
            'created_at' => \Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => \Carbon\Carbon::now()->toDateTimeString()
        ]);

    }
}