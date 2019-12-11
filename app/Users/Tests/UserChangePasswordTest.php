<?php

use App\Users\Application\Login\UserChangePassword;
use App\Users\Domain\User;
use App\Users\Domain\UserEmail;
use App\Users\Domain\UserId;
use App\Users\Domain\UserName;
use App\Users\Domain\UserPassword;

class UserChangePasswordTest extends TestCase
{

    /** @test */
    public function user_change_password_mock_works(): void
    {
        $userMock = new User(
            new UserId(uniqid()),
            new UserName('Test'),
            new UserEmail(uniqid()),
            new UserPassword(uniqid())
        );

        $oldPassword = new UserPassword(uniqid());
        $newPassword = $userMock->password();

        $userDBMock =  $this->createMock(UserChangePassword::class);
        $userDBMock->method('changePassword')->willReturn($userMock);

        $userFromRepository = $userDBMock->changePassword($oldPassword, $newPassword);

        $this->assertInstanceOf(User::class, $userFromRepository);
        $this->assertEquals($userMock->email()->value(), $userFromRepository->email());
        $this->assertEquals($userMock->password()->value(), $userFromRepository->password());
    }
}