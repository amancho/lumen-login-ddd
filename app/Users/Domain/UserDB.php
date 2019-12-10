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

    /**
     * Check credentials and returns user instance
     *
     * @param UserEmail $userEmail
     * @param UserPassword $userPassword
     * @return User|bool
     */
    public function login(UserEmail $userEmail, UserPassword $userPassword)
    {
        $userDB = $this->searchByEmail($userEmail);

        if ($userDB && $userDB->checkPassword($userPassword)){
            return $userDB;
        }

        return false;
    }

    private function getUser($data)
    {
        return new User(
            new UserId($data['id']),
            new UserName($data['name']),
            new UserEmail($data['email']),
            new UserPassword($data['password'])
        );
    }

    private function searchByEmail(UserEmail $userEmail)
    {
        if (array_key_exists($userEmail->value(), $this->users)){
            $userDB = $this->users[$userEmail->value()];
            return $this->getUser($userDB);
        }

        return null;
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