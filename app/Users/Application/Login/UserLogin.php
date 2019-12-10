<?php

namespace App\Users\Application\Login;

use App\Users\Contracts\UserLoginServiceContract;
use App\Users\Domain\UserEmail;
use App\Users\Domain\UserPassword;
use App\Users\Domain\UserDB;

class UserLogin implements UserLoginServiceContract
{
    private $repository;

    public function __construct(UserDB $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Check credentials userEmail + Password on the repository
     *
     * @param UserEmail $userEmail
     * @param UserPassword $userPassword
     * @return array
     */
    public function execute(UserEmail $userEmail, UserPassword $userPassword): array
    {
        $user = $this->repository->login($userEmail, $userPassword);

        if (empty($user)) {
            return [
                'success' => false,
                'data' => [],
                'errors' => 'Invalid credentials'
            ];
        }

        return [
            'success' => true,
            'data' => [
                'id' => $user->id()->value(),
                'email' => $user->email()->value(),
                'name' => $user->name()->value()
            ]
        ];
    }
}