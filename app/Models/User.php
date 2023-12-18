<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Event\Event;
use App\Models\Event\EventParticipant;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;


/**
 * Table: users
 *
 * === Columns ===
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string $login
 * @property string $password
 * @property Carbon|null birthday
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * === Relationships ===
 * @property-read Event[] $myEvents
 * @property-read Event[] $participants
 * @property-read \Laravel\Sanctum\PersonalAccessToken|null $tokens
 * @property-read \Illuminate\Notifications\DatabaseNotification|null $notifications
 *
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'login',
        'password',
        'birthday'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed',
        'birthday' => 'datetime'
    ];


    public function myEvents(): HasMany
    {
        return $this->hasMany(Event::class);
    }

    public function participants(): BelongsToMany
    {
        return $this->belongsToMany(Event::class, EventParticipant::table());
    }
}
