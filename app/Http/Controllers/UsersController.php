<?php

namespace App\Http\Controllers;

use App\Users\Application\Login\UserLogin;
use App\Users\Application\Login\UserLoginRequestValidation;
use App\Users\Domain\UserDB;
use App\Users\Services\SingInService;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private $singInService;

    public function __construct()
    {
       $userDB = new UserDB();
       $userLogin = new UserLogin($userDB);
       $userLoginRequestValidation = new UserLoginRequestValidation();
       $this->singInService = new SingInService($userLogin, $userLoginRequestValidation);
    }

    /**
     * Validate username and password.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate(Request $request)
    {
        $post = $request->all();
        return $this->singInService->login($post);
    }
}
