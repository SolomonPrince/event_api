<?php

namespace App\Http\Responses;

class ErrorApiResponse extends ApiErrorResponse
{
    protected function getResponseCode(): int
    {
        return 500;
    }

    protected function defaultErrorMessage(): string
    {
        return 'Error.';
    }
}
