<?php

namespace App\Http\Responses;

use Illuminate\Contracts\Support\Responsable;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;

abstract class ApiBaseResponse extends Response implements Responsable
{
    protected array|string|object $dataOrMessage;

    private function __construct(array|string|object $dataOrMessage = [])
    {
        parent::__construct();

        $this->dataOrMessage = $dataOrMessage;
    }

    public static function make(array|string|object $dataOrMessage = []): static
    {
        return new static($dataOrMessage);
    }

    public function toResponse($request): JsonResponse
    {
        $response = new JsonResponse([
            'result' => $this->dataOrMessage,
            'error' => null,
        ]);

        $response->setStatusCode($this->getResponseCode());
        $response->headers->add(
            $this->headers->all()
        );

        return $response;
    }

    abstract protected function getResponseCode(): int;
}
