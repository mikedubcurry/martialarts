<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymSession extends Model
{
    use HasFactory;
    protected $fillable = [
        'discipline_id',
        'gym_id',
        'date',
        'start_time',
        'end_time',
        'notes',
        'details',
    ];

    public function gym()
    {
        return $this->belongsTo(Gym::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function discipline()
    {
        return $this->belongsTo(Discipline::class);
    }

    public function notes()
    {
        return $this->hasOne(GymSessionNote::class);
    }

    public function promptAnswers()
    {
        return $this->hasMany(SessionPromptAnswer::class);
    }
}
