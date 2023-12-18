<?php

namespace App\Http\Responses;

class ErrorUnauthenticatedResponse extends ApiErrorResponse
{
    protected function getResponseCode(): int
    {
        return 401;
    }

    protected function defaultErrorMessage(): string
    {
        return 'Auth error go away.';
    }
}
