<?php

namespace App\Http\Responses;

class SuccessApiResponse extends ApiBaseResponse
{
    protected function getResponseCode(): int
    {
        return 200;
    }
}
