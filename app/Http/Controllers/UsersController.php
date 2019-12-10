<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private $singInService;

    public function __construct(SingInService $singInService)
    {
        $this->singInService = $singInService;
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
        $this->singInService->login($post);
        $result = 'Validation OK';

        return response()->json([
            'status' => 'success',
            'result' => $result
            ]
        );
    }
}
