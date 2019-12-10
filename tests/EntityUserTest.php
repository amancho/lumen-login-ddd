<?php

use Domain\Entities\User;

class EntityUserTest extends TestCase
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