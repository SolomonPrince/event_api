<?php

namespace App\Http\Responses;

class ErrorTooManyAttemptsResponse extends ApiErrorResponse
{
    protected function getResponseCode(): int
    {
        return 429;
    }

    protected function defaultErrorMessage(): string
    {
        return 'Too many request please stop.';
    }
}
