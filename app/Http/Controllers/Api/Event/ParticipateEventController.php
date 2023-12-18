<?php

namespace App\Http\Controllers\Api\Event;

use App\Http\Controllers\Controller;
use App\Http\Requests\EventParticipateRequest;
use App\Services\Event\EventParticipantService;
use App\Http\Responses\ApiBaseResponse;
use App\Http\Responses\SuccessApiResponse;
use App\Http\Responses\ErrorApiResponse;

class ParticipateEventController extends Controller
{
    public function __construct(
        protected readonly EventParticipantService $service,
    ){}

    public function addParticipate(EventParticipateRequest $request): ApiBaseResponse
    {
        try {
            $this->service->store($request->event_id, auth()->user()->id);
            return SuccessApiResponse::make('event participate create successefuly');
        }catch (\Exception $ex) {
            return ErrorApiResponse::make($ex->getMessage());
        }
    }


    public function cancelParticipate(EventParticipateRequest $request): ApiBaseResponse
    {
        try {
            $this->service->delete($request->event_id, auth()->user()->id);
            return SuccessApiResponse::make('event participate delete successefuly');
        }catch (\Exception $ex) {
            return ErrorApiResponse::make($ex->getMessage());
        }
    }
}
