<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymSessionNote extends Model
{
    use HasFactory;
    protected $fillable = [
        'note',
        'user_id',
        'gym_session_id',
    ];
}
