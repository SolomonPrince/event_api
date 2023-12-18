<?php

namespace App\Http\Responses;

class ErrorInternalServerErrorResponse extends ApiErrorResponse
{
    protected function getResponseCode(): int
    {
        return 500;
    }

    protected function defaultErrorMessage(): string
    {
        return 'Error request try again later';
    }
}
