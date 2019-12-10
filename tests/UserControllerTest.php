<?php

class UsersControllerTest extends TestCase
{
    /**
     * Test user login authentication.
     *
     * @return void
     */
    public function testUserLoginRoute()
    {
        $this->post('/login');

        $this->json('POST', '/login')->assertResponseStatus(200);
    }

    /**
     * Test user login bad url.
     *
     * @return void
     */
    public function testUserLoginRouteFails()
    {
        $wrongUrl = '/test' . uniqid();
        $this->json('POST', $wrongUrl)->assertResponseStatus(404);
    }
}