<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LeadershipMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'role',
        'designation',
        'name',
        'photo_path',
        'message',
        'qualification',
        'email',
        'phone',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];
}
