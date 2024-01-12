<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoalProgress extends Model
{
    use HasFactory;
    protected $fillable = [
        'goal_id',
        'note',
        'completed',
        'session_id',
    ];

    public function goal()
    {
        return $this->belongsTo(Goal::class);
    }


}
