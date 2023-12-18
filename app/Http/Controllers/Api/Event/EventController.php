<?php

namespace App\Http\Controllers\Api\Event;

use App\Http\Controllers\Controller;
use App\Models\Event\Event;
use App\Http\Requests\EventCreateRequest;
use App\Http\Responses\ApiBaseResponse;
use App\Http\Responses\SuccessApiResponse;
use App\Http\Responses\ErrorApiResponse;
use App\Services\Event\EventService;
use App\Data\EventData;

class EventController extends Controller
{
    public function __construct(
        protected readonly EventService $service,
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index(): ApiBaseResponse
    {
        try {
            $events = Event::query()->orderBy('id', 'desc')->get();
            return SuccessApiResponse::make($events);
        }catch (\Exception $ex) {
            return ErrorApiResponse::make($ex->getMessage());
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EventCreateRequest $request): ApiBaseResponse
    {
        try {
            $event = $this->service->store(
                EventData::fromRequest($request, auth()->user()->id)
            );
            return SuccessApiResponse::make($event);
        } catch (\Exception $ex) {
            return ErrorApiResponse::make($ex->getMessage());
        }
    }

    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Event $event): ApiBaseResponse
    {
        try {
            if ($event->user_id != auth()->user()->id){
                return ErrorApiResponse::make('you do not have permission');
            }
            $this->service->delete($event);
            return SuccessApiResponse::make($event);
        } catch (\Exception $ex) {
            return ErrorApiResponse::make($ex->getMessage());
        }
    }
}
