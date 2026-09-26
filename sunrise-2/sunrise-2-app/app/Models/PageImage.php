<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PageImage extends Model
{
    protected $fillable = [
        'key',
        'page',
        'section',
        'label',
        'fallback_path',
        'image_path',
        'alt_text',
    ];
}
