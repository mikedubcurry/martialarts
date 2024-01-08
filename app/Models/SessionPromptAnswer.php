<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SessionPromptAnswer extends Model
{
    use HasFactory;
    protected $fillable = [
        'prompt_id',
        'answer',
        'gym_session_id',
    ];

    public function prompt()
    {
        return $this->belongsTo(SessionPrompt::class);
    }
}
