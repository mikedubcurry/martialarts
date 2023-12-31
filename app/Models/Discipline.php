<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Discipline extends Model
{
    use HasFactory;

    public function gyms()
    {
        return $this->belongsToMany(Gym::class, 'gym_disciplines');
    }

    public function prompts()
    {
        return $this->hasMany(SessionPrompt::class);
    }
}
