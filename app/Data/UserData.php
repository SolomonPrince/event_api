<?php

namespace App\Data;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\LaravelData\Attributes\MapOutputName;
use Spatie\LaravelData\Data;

class UserData extends Data
{
    public function __construct(
        #[MapOutputName('first_name')]
        public string $firstname,
        #[MapOutputName('last_name')]
        public string $lastname,
        public string $login,
        public ?string $password,
        public ?string $birthday,
    ) {}

    public static function fromRequest(FormRequest $request): self
    {
        return new self(
            firstname:  $request->first_name,
            lastname:   $request->last_name,
            login:   $request->login,
            password: $request->password,
            birthday: $request->birthday
        );
    }
}
