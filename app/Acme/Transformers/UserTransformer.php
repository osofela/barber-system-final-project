<?php


namespace Acme\Transformers;


class UserTransformer extends Transformer
{
    public function transform($user)
    {
        return [

            'first_name' => $user['first_name'],
            'last_name'  => $user['last_name'],
            'address' => $user['address'],
            'role' => $user['role'],
            'telephone' => $user['telephone'],
            'email' => $user['email']
        ];
    }
}