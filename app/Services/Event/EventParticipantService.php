<?php

namespace App\Services\Event;

use App\Models\Event\EventParticipant;


class EventParticipantService
{
    /*
         *
         *
        */
    public function store(int $eventId, int $userId): EventParticipant
    {
        return EventParticipant::create([
            'event_id' => $eventId,
            'user_id' => $userId,
        ]);
    }

    

    /*
    *
    *
    *
    */
    public function delete(int $eventId, int $userId): bool
    {
        return EventParticipant::where(['event_id' => $eventId, 'user_id' => $userId])->delete();
    }
}
