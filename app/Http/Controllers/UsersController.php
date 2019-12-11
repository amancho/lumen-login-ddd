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
    private $userLogin;

    public function __construct(UserLogin $userLogin=null)
    {
        $this->setSingInService($userLogin);
    }

    private function setSingInService($userLogin)
    {
        $this->setUserLogin($userLogin);

        if (!empty($this->userLogin)) {
            $userLoginRequestValidation = new UserLoginRequestValidation();
            $this->singInService = new SingInService($userLogin, $userLoginRequestValidation);
        }
    }

    private function setUserLogin($userLogin)
    {
        if (empty($this->userLogin)) {
            $userDB = new UserDB();
            $this->userLogin = new UserLogin($userDB);
        }
        else{
            $this->userLogin = $userLogin;
        }
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
