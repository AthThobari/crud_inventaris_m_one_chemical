<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
        'quantity',
        'price',
        'item_id',
        'category_id',
        'created_at',
    ];
}
