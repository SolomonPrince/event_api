<?php

namespace App\Http\Controllers\Api\Auth;

use App\Data\UserData;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Http\Responses\ApiBaseResponse;
use App\Http\Responses\SuccessApiResponse;
use App\Http\Responses\ErrorApiResponse;
use App\Services\User\UserService;

class RegistrationController extends Controller
{
    public function __construct(
        protected readonly UserService $service,
    ){}

    public function __invoke(RegistrationRequest $request): ApiBaseResponse
    {
       try {
            $user = $this->service->store(
                UserData::fromRequest($request)
            );
            $user->tokem = $user->createToken("api_token")->plainTextToken;
            return SuccessApiResponse::make($user);
       } catch (\Exception $ex) {
           return ErrorApiResponse::make($ex->getMessage());
       }
    }
}
