<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'room_number',
        'fk_id_dormitory'
    ];

    protected $table = 'rooms';

    public function roomimages()
    {
        return $this->hasMany(RoomImage::class, "fk_id_room");
    }

    public function dormitory()
    {
        return $this->belongsTo(Dormitory::class, "fk_id_dormitory" );
    }
}
