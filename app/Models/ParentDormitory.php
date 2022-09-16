<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParentDormitory extends Model
{
    use HasFactory;

    protected $table = 'dormitories';

    protected $fillable = [
        'name',
        'phone_number'
    ];
}
