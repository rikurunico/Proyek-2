<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PriceCost extends Model
{
    use HasFactory;

    protected $table = 'price_cost';

    protected $fillable = [
        'price',
    ];
}
