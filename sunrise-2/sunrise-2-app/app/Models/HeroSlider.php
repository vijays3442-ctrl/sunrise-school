<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HeroSlider extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'subtitle',
        'image_path',
        'button_text',
        'button_link',
        'is_active',
        'sort_order',
    ];
}
