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

        $params = ['username' => 'aaa', 'password' => 'aaa'];
        $response = $this->json('POST', '/login', $params)->response;

        $this->assertResponseStatus(200);
    }

    /**
     * Test user login bad url.
     *
     * @return void
     */
    public function testUserLoginRouteFails()
    {
        $wrongUrl = '/test' . uniqid();
        $this->json('POST', $wrongUrl);
        $this->assertResponseStatus(404);
    }
}