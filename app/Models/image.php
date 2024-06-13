<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class image extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'item_id',
        'image_url',
    ];
}
