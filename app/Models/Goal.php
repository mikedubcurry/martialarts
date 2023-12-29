<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
{
    use HasFactory;

    protected $fillable = [
        'goal',
        'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function goalProgresses()
    {
        return $this->hasMany(GoalProgress::class);
    }
}
