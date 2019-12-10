<?php

namespace Domain\Tests;

use Domain\Entities\User;
use PHPUnit\Framework\TestCase;

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