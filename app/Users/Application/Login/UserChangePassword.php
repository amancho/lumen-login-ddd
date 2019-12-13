<?php

namespace App\Users\Application\Login;

use App\Users\Contracts\UserChangePasswordServiceContract;
use App\Users\Domain\UserPassword;

class UserChangePassword implements UserChangePasswordServiceContract
{
    /**
     * Change user password
     *
     * @param UserPassword $oldPassword
     * @param UserPassword $newPassword
     * @return bool
     */
    public function changePassword(UserPassword $oldPassword, UserPassword $newPassword)
    {
        // TODO
        return false;
    }
}
