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
    public function testUserInstance(): void
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