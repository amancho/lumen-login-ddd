<?php

namespace App\Users\Application\Login;

use App\Users\Contracts\UserLoginServiceContract;
use App\Users\Domain\UserEmail;
use App\Users\Domain\UserId;
use App\Users\Domain\UserPassword;
use App\Users\Domain\UserDB;
use Firebase\JWT\JWT;

class UserLogin implements UserLoginServiceContract
{
    private $repository;
    private $jwt;

    public function __construct(UserDB $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Check credentials userEmail + Password on the repository
     *
     * @param UserEmail $userEmail
     * @param UserPassword $userPassword
     * @return array
     */
    public function execute(UserEmail $userEmail, UserPassword $userPassword): array
    {
        $user = $this->repository->login($userEmail, $userPassword);

        if (empty($user)) {
            return [
                'success' => false,
                'data' => [],
                'errors' => 'Invalid credentials'
            ];
        }

        return [
            'success' => true,
            'data' => [
                'id' => $user->id()->value(),
                'email' => $user->email()->value(),
                'name' => $user->name()->value(),
                'jwt' => $this->getJWT($user->id()),
            ]
        ];
    }

    public function getJWT(UserId $userId): string
    {
        $tokenId    = base64_encode(uniqid());    // Json Token Id: an unique identifier for the token
        $issuedAt   = time();                     // Issued at: time when the token was generated
        $notBefore  = $issuedAt + 10;             // Adding 10 seconds
        $expire     = $notBefore + 60 * 60 * 12;  // Adding 12 hours

        /*
         * Create the token as an array
         */
        $data = [
            'iat'  => $issuedAt,
            'jti'  => $tokenId,
            'nbf'  => $notBefore,
            'exp'  => $expire,
            'data' => [                         // Data related to the signer user
                'userId'   => $userId->value(),
            ]
        ];

        $secretKey = base64_decode('lumen-login-ddd');

        $this->jwt = JWT::encode(
            $data,      //Data to be encoded in the JWT
            $secretKey, // The signing key
            'HS512'     // Algorithm used to sign the token, see https://tools.ietf.org/html/draft-ietf-jose-json-web-algorithms-40#section-3
        );

        return $this->jwt;
    }
}