<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'isFeatured',
        'image',
        'tags',
        'content',
    ];

    protected $casts = [
        'isFeatured' => 'boolean',
        'tags' => 'array',
    ];
}
