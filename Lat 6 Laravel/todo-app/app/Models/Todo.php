<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    protected $fillable = ['title', 'description', 'is_completed', 'completed_at'];

    // Cast otomatis agar completed_at bertipe Carbon/Datetime PHP
    protected $casts = [
        'completed_at' => 'datetime',
    ];
}
