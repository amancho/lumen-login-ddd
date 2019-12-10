<?php

use App\Domain\Entities\User;

class UserEntityTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testUserInstance()
    {
        $user = new User();
        $this->assertInstanceOf(User::class, $user);
    }
}