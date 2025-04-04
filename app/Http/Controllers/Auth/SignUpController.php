<?php

namespace App\Http\Controllers\Auth;

use App\ApiResponse\Facades\ApiResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\SignUpRequest;
use App\Services\Auth\AuthService;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function __construct(public AuthService $authService){}

    /**
     * Handle the incoming request.
     */
    public function __invoke(SignUpRequest $request)
    {
        $result = $this->authService->signup($request->validated());

        if(!$result->ok){
            return ApiResponse::withMessage('Something went wrong, try again later')->withData($result->data)->withStats(500)->build()->response();
        }

        return ApiResponse::withMessage('User Signup successfully.')->withStatus(200)->build()->response();
    }
}
