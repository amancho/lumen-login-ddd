<?php

class UsersControllerTest extends TestCase
{

    protected $url = '/login';
    protected $email;
    protected $password;

    /**
     * Test user login with empty email and fails
     *
     * @return void
     */
    public function testUserLoginEmailFails()
    {
        $this->email = null;
        $this->password = '123456';
        $response = $this->postLogin();

        $this->assertResponseStatus(500);
        $this->assertFalse($response['success']);
        $this->assertNotEmpty($response['errors']);
        $this->assertContains('email', $response['errors']);
    }

    /**
     * Test user login with empty password and fails
     *
     * @return void
     */
    public function testUserLoginPasswordFails()
    {
        $this->email = 'amancho@gmail.com';
        $this->password = null;
        $response = $this->postLogin();

        $this->assertResponseStatus(500);
        $this->assertFalse($response['success']);
        $this->assertNotEmpty($response['errors']);
        $this->assertContains('password', $response['errors']);
    }

    /**
     * Test user login with allowed credentials
     *
     * @return void
     */
    public function testUserLoginWorks()
    {
        $this->email = 'amancho@gmail.com';
        $this->password = '123456';
        $response = $this->postLogin();

        $this->assertResponseStatus(200);
        $this->assertTrue($response['success']);
        $this->assertNotEmpty($response['data']['id']);
        $this->assertNotEmpty($response['data']['jwt']);
        $this->assertEquals($this->email, $response['data']['email']);
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

    /**
     * Shared post /login
     *
     * @return mixed
     */
    private function postLogin()
    {
        $params = [
            'email' => $this->email,
            'password' => $this->password
        ];

        return $this->json('POST', $this->url, $params)->response->getOriginalContent();
    }
}