<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event\Event;
use App\Services\Event\EventParticipantService;

class EventController extends Controller
{
    public function __construct(
        protected readonly EventParticipantService $service,
    ){}

    public function show(int $id){
        $event = Event::with(['participants'])->find($id);
        return view('event.show', compact('event'));
    }

    public function addParticipate(int $id){
        $this->service->store($id, auth()->user()->id);
        return back();
    }

    public function cancelParticipate(int $id){
        $this->service->delete($id, auth()->user()->id);
        return back();
    }

    public function ajaxEvent(){
        $events = Event::query()->orderBy('id', 'desc')->get();
        return view('event.ajax', compact('events'));
    }
}
