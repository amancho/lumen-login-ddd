<?php

namespace App\Users\Contracts;

use App\Users\Domain\UserPassword;

/**
 * Interface RepositoryContract
 */
interface UserChangePasswordServiceContract
{

    public function changePassword(UserPassword $oldPassword, UserPassword $newPassword);
}