<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partnership extends Model
{
    protected $fillable = [
        'link',
        'image',
        'name',
        'isCurrent',
    ];
}
