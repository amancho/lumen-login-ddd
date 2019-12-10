<?php

namespace App\Users\Application\Login;

class UserLoginRequestValidation
{
    /**
     * Check required login keys email and password on request
     *
     * @param array $post Request data
     * @return bool
     * @throws \Exception
     */
    public function validateLogin($post): bool
    {
        if(!array_key_exists('email', $post) || empty($post['email'])){
            throw new \Exception('Invalid email');
        }

        if(!array_key_exists('password', $post) || empty($post['password'])){
            throw new \Exception('Invalid password');
        }

        return true;
    }
}