<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Responses\ApiBaseResponse;
use App\Http\Responses\SuccessApiResponse;
use App\Http\Responses\ErrorApiResponse;

class LoginController extends Controller
{   
    public function __invoke(LoginRequest $request): ApiBaseResponse
    {
       try {
            if (auth()->attempt(['login' => $request->login, 'password' => $request->password])){
                $user = auth()->user();

                $user->tokem = $user->createToken("api_token")->plainTextToken;
                return SuccessApiResponse::make($user);
            }else{
                return ErrorApiResponse::make("user not found");
            }
        } catch (\Exception $ex) {
            return ErrorApiResponse::make($ex->getMessage());
        }
    }
}
