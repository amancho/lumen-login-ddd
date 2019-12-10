<?php

namespace App\Users\Application\Login;

class UserLoginRequestValidation
{
    public function validateLogin($post)
    {
        if(!array_key_exists('email', $post) || !empty($post['email'])){
            throw new \Exception('Invalid email');
        }

        if(!array_key_exists('password', $post) || !empty($post['password'])){
            throw new \Exception('Invalid password');
        }
    }
}