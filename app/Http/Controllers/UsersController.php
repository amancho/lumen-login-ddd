<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }


    /**
     * Validate username and password.
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function authenticate(Request $request)
    {
        $userName = $request->input('username');
        $userPassword = $request->input('password');
        $result = 'Validation OK';

        return response()->json([
            'status' => 'success',
            'result' => $result
            ]
        );
    }
}
