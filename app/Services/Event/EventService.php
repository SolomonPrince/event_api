<?php

namespace App\Services\Event;

use App\Data\EventData;
use App\Models\Event\Event;


class EventService
{
    /*
         *
         *
        */
    public function store(EventData $dto): Event
    {
        return Event::create([
            'title' => $dto->title,
            'text' => $dto->text,
            'user_id' => $dto->user_id,
        ]);
    }

    /*
     *
     *
     *
    */
    public function update(Event $event, EventData $dto): Event
    {
        return tap($event)->update([
            'title' => $dto->title,
            'text' => $dto->text,
            'user_id' => $dto->user_id,
        ]);
    }

    /*
    *
    *
    *
    */
    public function delete(Event $event): bool
    {
        return $event->delete();
    }
}
