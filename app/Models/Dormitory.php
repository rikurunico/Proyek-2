<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dormitory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'address',
        'phone_number',
    ];

    protected $table = 'dormitories';

    public function rooms()
    {
        return $this->hasMany(Room::class, "fk_id_dormitory");
    }

    public function paymentLogs()
    {
        return $this->hasMany(PaymentLog::class, "dormitory_id");
    }
}