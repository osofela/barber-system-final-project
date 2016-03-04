<?php
/**
 * Created by PhpStorm.
 * User: garyobrien
 * Date: 04/03/2016
 * Time: 20:22
 */

namespace Acme\Transformers;


class AppointmentTransformer extends Transformer
{
    public function transform($appointment)
    {
        return [

            'user_id' => $appointment['user_id'],
            'barber_id' => $appointment['barber_id'],
            'haircut_type' => $appointment['haircut_type'],
            'music_choice' => $appointment['music_choice'],
            'drink_choice' => $appointment['drink_choice'],
            'date' => $appointment['date'],
            'start_time' => $appointment['start_time'],
            'end_time' => $appointment['end_time']
        ];
    }
}