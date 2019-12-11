<?php

namespace App\Users\Contracts;

use App\Users\Domain\UserEmail;
use App\Users\Domain\UserPassword;

/**
 * Interface RepositoryContract
 */
interface UserLoginServiceContract
{

    public function execute(UserEmail $userEmail, UserPassword $userPassword):? array;
}