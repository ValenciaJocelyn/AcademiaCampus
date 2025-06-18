<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShuttleStatus extends Model
{
    protected $table = 'shuttle_status';
    protected $fillable = [
        'shuttle_id',
        'current_stop',
        'next_stop',
        'departure_time',
        'arrival_time'
    ];

    public function shuttle()
    {
        return $this->belongsTo(ShuttleBus::class, 'shuttle_id');
    }
}
