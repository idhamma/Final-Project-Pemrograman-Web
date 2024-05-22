<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorcycle extends Model
{
    use HasFactory;

    protected $table = 'motorcycle'; 

    protected $fillable = [
        'plat_number',
        'name',
        'brand',
        'category',
        'cc',
        'year',
        'location',
        'image',
        'fee',
        'status',
    ];
    
}
