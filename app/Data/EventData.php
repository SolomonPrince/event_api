<?php

namespace App\Data;

use Illuminate\Foundation\Http\FormRequest;
use Spatie\LaravelData\Data;

class EventData extends Data
{
    public function __construct(
        public ?string $title,
        public ?string $text,
        public ?int $user_id,
    ) {}


    public static function fromRequest(FormRequest $request, int $userId): self
    {
        return new self(
            title:  $request->title,
            text:   $request->text,
            user_id:   $userId,
        );
    }
}
