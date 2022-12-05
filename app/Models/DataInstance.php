<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataInstance extends Model
{
    use HasFactory;

    protected $table = 'data_instances';

    protected $guarded = ["id"];
}
