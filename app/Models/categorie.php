<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    protected $primaryKey = 'category_id';
    public $timestamps = false;
    protected $fillable = [
        'name',
        'description',
    ];
}

