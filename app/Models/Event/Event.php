<?php

namespace App\Models\Event;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Table: events
 *
 * === Columns ===
 * @property int $id
 * @property string $title
 * @property string $text
 * @property integer $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * === Relationships ===
 * @property-read User $user
 * @property-read User[] $participants
 *
 */
class Event extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'text',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(User::class, EventParticipant::table());
    }
}
