<?php

namespace App\Users\Services;

use App\Users\Application\Login\UserLoginRequestValidation;
use App\Users\Contracts\UserLoginServiceContract;
use App\Users\Domain\UserEmail;
use App\Users\Domain\UserPassword;

class SingInService
{
    private $requestValidation;
    private $singInDomainService;
    private $userEmail;
    private $userPassword;

    public function __construct(
        UserLoginServiceContract $userLoginServiceContract,
        UserLoginRequestValidation $userRequestValidation)
    {
        $this->singInDomainService = $userLoginServiceContract;
        $this->requestValidation = $userRequestValidation;
    }

    public function login($post)
    {
        try{
            $this->requestValidation->validateLogin($post);

            $this->userEmail = new UserEmail($post['email']);
            $this->userPassword = new UserPassword($post['password']);

            $result = $this->singInDomainService->execute($this->userEmail, $this->userPassword);

            return response()->json($result) ;
        }
        catch(\Exception $ex){
            return response()->json([
                    'success' => false,
                    'errors' => $ex->getMessage(),
                ],
                500) ;
        }
    }
}