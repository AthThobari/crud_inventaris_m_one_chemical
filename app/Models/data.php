<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class data extends Model
{
    protected $fillable = [
        'nama_barang',
        'kategori',
        'stok',
        'image',
    ];
}
