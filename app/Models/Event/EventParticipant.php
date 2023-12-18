<?php

namespace App\Models\Event;

use App\Models\BaseModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class EventParticipant extends BaseModel
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'user_id',
    ];

    public $timestamps = false;
}
