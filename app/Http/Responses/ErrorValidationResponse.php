<?php

namespace App\Http\Responses;

class ErrorValidationResponse extends ApiErrorResponse
{
    protected function getResponseCode(): int
    {
        return 422;
    }

    protected function defaultErrorMessage(): string
    {
        return 'Validation error.';
    }
}
