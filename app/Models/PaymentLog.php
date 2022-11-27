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
        'dormitory_id',
        'total_bulan',
        'bulan_mulai',
        'bulan_selesai',
        'bukti_pembayaran',
    ];

    public function dormitory()
    {
        return $this->belongsTo(Dormitory::class, "dormitory_id");
    }
}
