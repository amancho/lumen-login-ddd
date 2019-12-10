<?php

namespace App\Users\Domain;

interface UserRepository
{
    public function save(User $user): void;
    public function login(UserEmail $userEmail, UserPassword $userPassword ): ?User;
    public function search(UserId $id): ?User;
}