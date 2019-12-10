<?php

use App\Users\Domain\User;
use App\Users\Domain\UserDB;
use App\Users\Domain\UserEmail;
use App\Users\Domain\UserId;
use App\Users\Domain\UserName;
use App\Users\Domain\UserPassword;

class UserRepositoryTest extends TestCase
{
    /**
     * @var UserDB
     */
    private $repository;


    protected function repository()
    {
        if (empty($this->repository)) {
            $this->repository = new UserDB();
        }

        return $this->repository;
    }

    /** @test */
    public function user_login_works(): void
    {
        $email = new UserEmail('amancho@gmail.com');
        $password = new UserPassword('123456');

        $userFromRepository = $this->repository()->login($email, $password);

        $this->assertInstanceOf(User::class, $userFromRepository);
        $this->assertEquals($email->value(), $userFromRepository->email());
        $this->assertEquals($password->value(), $userFromRepository->password());
    }

    /** @test */
    public function user_login_password_fails(): void
    {
        $email = new UserEmail('amancho@gmail.com');
        $password = new UserPassword('666');

        $userFromRepository = $this->repository()->login($email, $password);

        $this->assertEmpty($userFromRepository);
    }

    /** @test */
    public function user_login_email_fails(): void
    {
        $email = new UserEmail(uniqid());
        $password = new UserPassword(uniqid());

        $userFromRepository = $this->repository()->login($email, $password);

        $this->assertEmpty($userFromRepository);
    }
}