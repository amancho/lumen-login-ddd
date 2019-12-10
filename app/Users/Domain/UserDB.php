<?php


namespace App\Users\Domain;


class UserDB implements UserRepository
{
    protected $users = [];

    public function __construct(array $users)
    {
        $this->users = $users;
    }


    public function save(User $user): void
    {

    }

    public function login(UserEmail $userEmail, UserPassword $userPassword ): User
    {
        $user = new User();

        return $user;
    }

    public function search(UserId $id): User
    {

    }
}