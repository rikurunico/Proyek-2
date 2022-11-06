<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaymentLog extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'payment_logs';

    protected $fillable = [
        'payment_date',
        'status',
        'payment_month',
    ];
}
