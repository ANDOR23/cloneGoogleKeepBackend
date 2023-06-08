<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    protected $fillable = [
        'id',
        'title',
        'content',
        'pinned',
        'archived',
        'color'
    ];
}
