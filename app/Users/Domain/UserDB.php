<?php

namespace App\Users\Domain;
/**
 * Class UserDB
 * Works like a DB Repository
 * @package App\Users\Domain
 */
class UserDB implements UserRepository
{
    protected $users = [];

    public function __construct(array $users=null)
    {
        if (!empty($users)) {
            $this->users[] = $users;
        }

        $this->generateFakeUsers();
    }

    public function save(User $user): void
    {

    }

    public function login(UserEmail $userEmail, UserPassword $userPassword ): User
    {
        $result = null;

        if (array_key_exists($userEmail->value(), $this->users)){
            $user = $this->users[$userEmail->value()];
            $result = new User(
                new UserId($user['id']),
                new UserName($user['name']),
                new UserEmail($user['email']),
                new UserPassword($user['password'])
            );
        }

        return $result;
    }

    public function search(UserId $id): User
    {

    }

    private function generateFakeUsers()
    {
        $this->users['amancho@gmail.com'] = [
            'id' => uniqid(),
            'email' => 'amancho@gmail.com',
            'password' => '123456',
            'name' => 'Abel',
        ];

        $this->users['jdomenech@drivania.com'] = [
            'id' => uniqid(),
            'email' => 'jdomenech@gmail.com',
            'password' => '123456',
            'name' => 'Jordi',
        ];

        $this->users['fran@drivania.com'] = [
            'id' => uniqid(),
            'email' => 'fran@gmail.com',
            'password' => '123456',
            'name' => 'Fran',
        ];
    }
}