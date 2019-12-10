<?php

namespace App\Users\Services;

use App\Users\Application\Login\UserLoginRequestValidation;
use App\Users\Contracts\UserLoginServiceContract;

class SingInService
{
    private $requestValidation;
    private $singInDomainService;

    public function __construct(
        UserLoginServiceContract $userLoginServiceContract,
        UserLoginRequestValidation $userRequestValidation)
    {
        $this->singInDomainService = $userLoginServiceContract;
        $this->requestValidation = $userRequestValidation;
    }

    public function login($post)
    {
        $this->requestValidation->validateLogin($post);
        return $this->singInDomainService->execute($post);
    }
}