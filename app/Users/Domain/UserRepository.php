<?php

namespace App\Users\Domain;

interface UserRepository
{
    public function login(UserEmail $userEmail, UserPassword $userPassword );
}