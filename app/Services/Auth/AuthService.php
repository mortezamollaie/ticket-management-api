<?php

namespace App\Services\Auth;

use App\ApiResponse\ServiceWrapper;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function signup(array $data)
    {
        return app(ServiceWrapper::class)(function() use ($data){
            $data['password'] = Hash::make($data['password']);
            return User::create($data);
        });
    }

    public function login()
    {

    }
}
