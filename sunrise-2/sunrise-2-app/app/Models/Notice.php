<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    protected $fillable = [
        'title',
        'content',
        'date',
        'is_active',
    ];
    
    protected $casts = [
        'date' => 'date',
        'is_active' => 'boolean',
    ];
}
