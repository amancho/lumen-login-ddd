<?php

use App\Users\Domain\User;
use App\Users\Domain\UserEmail;
use App\Users\Domain\UserId;
use App\Users\Domain\UserName;
use App\Users\Domain\UserPassword;
use App\Users\Domain\UserRepository;

class UserRepositoryTest extends TestCase
{
    private $repository;

    protected function repository()
    {
        return $this->repository = $this->repository ?: $this->mock(UserRepository::class);
    }

    /** @test */
    public function user_login_works(): void
    {

    }

}