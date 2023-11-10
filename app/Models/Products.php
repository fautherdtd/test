<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $fillable = [
        'title',
        'price',
        'is_active',
        'making_date',
        'created_at',
        'updated_at'
    ];
}
