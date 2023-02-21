<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PastEvent extends Model
{
    protected $event = [
        'title',
        'date',
        'content',
        'image'
    ];
}
