<?php

use App\Users\Domain\User;
use App\Users\Domain\UserEmail;
use App\Users\Domain\UserId;
use App\Users\Domain\UserName;
use App\Users\Domain\UserPassword;

class UserEntityTest extends TestCase
{
    /**
     * A UserInstance test
     *
     * @return void
     */
    public function test_user_instance(): void
    {
        $dataTest = $this->generateDataTest();

        $user = new User(
            (new UserId(uniqid())),
            (new UserName($dataTest['name'])),
            (new UserEmail($dataTest['email'])),
            (new UserPassword($dataTest['password']))
        );

        $this->assertInstanceOf(User::class, $user);
        $this->assertEquals($dataTest['name'], $user->name());
        $this->assertEquals($dataTest['email'], $user->email());
        $this->assertEquals(md5($dataTest['password']), $user->password());
    }

    /**
     * Password correct
     *
     * @return void
     */
    public function test_user_check_password_works(): void
    {
        $dataTest = $this->generateDataTest();

        $user = new User(
            (new UserId(uniqid())),
            (new UserName($dataTest['name'])),
            (new UserEmail($dataTest['email'])),
            (new UserPassword($dataTest['password']))
        );

        $result = $user->checkPassword($user->password());

        $this->assertTrue($result);
    }

    /**
     * Password incorrect
     *
     * @return void
     */
    public function test_user_check_password_fails(): void
    {
        $dataTest = $this->generateDataTest();

        $user = new User(
            (new UserId(uniqid())),
            (new UserName($dataTest['name'])),
            (new UserEmail($dataTest['email'])),
            (new UserPassword($dataTest['password']))
        );

        $result = $user->checkPassword((new UserPassword('asdf')));

        $this->assertFalse($result);
    }

    /**
     * @return array
     */
    private function generateDataTest(): array
    {
        return [
            'name' => 'Test' . time(),
            'email' => time() . '@domain.com',
            'password' => 'pwd' . time(),
        ];
    }
}
