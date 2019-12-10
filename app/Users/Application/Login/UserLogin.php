<?php

namespace App\Users\Application\Login;

use App\Users\Domain\User;
use App\Users\Domain\UserEmail;
use App\Users\Domain\UserPassword;
use App\Users\Domain\UserRepository;

final class UserLogin
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(UserEmail $userEmail, UserPassword $userPassword): User
    {
        $user = $this->repository->login($userEmail, $userPassword);
        if (null === $user) {
            throw new StudentNotExist($id);
        }

        return $user;
    }
}