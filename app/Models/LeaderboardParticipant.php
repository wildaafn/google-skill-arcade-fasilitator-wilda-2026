<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaderboardParticipant extends Model
{
    protected $fillable = [
        'name',
        'profile_url',
        'profile_token',
        'arcade_count',
        'skill_count',
        'bonus_points',
        'total_points',
        'milestone_reached',
        'last_checked_at',
    ];

    protected $casts = [
        'last_checked_at' => 'datetime',
    ];
}
