<?php

namespace App\Http\Controllers\Auth;

use App\ApiResponse\Facades\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Services\Auth\AuthService;

class LoginController extends Controller
{
    public function __construct(public AuthService  $authService)
    {
    }

    public function __invoke(LoginRequest $request)
    {
        $result = $this->authService->login($request->validated());
        if(!$result->ok){
            return ApiResponse::withMessage('Something went wrong. try again later...')->withStatus(500)->build()->response();
        } else if ($result->data == 'failed'){
            return ApiResponse::withMessage('Email or password was wrong')->withStatus(400)->build()->response();
        }
        return ApiResponse::withMessage('User logged in successfully.')->withStatus(200)->withData($result->data)->build()->response();
    }
}
