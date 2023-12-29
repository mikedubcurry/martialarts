<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city',
        'state',
        'zip',
        'phone',
        'slug',
    ];

    public function disciplines()
    {
        return $this->belongsToMany(Discipline::class, 'gym_disciplines');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
