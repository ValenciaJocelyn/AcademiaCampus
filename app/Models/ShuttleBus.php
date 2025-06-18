<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShuttleBus extends Model
{
    protected $table = 'shuttle_bus';
    protected $fillable = [
        'plate_number',
        'bus_type',
        'route_id'
    ];

    public function route()
    {
        return $this->belongsTo(ShuttleRoute::class, 'route_id');
    }

    public function status()
    {
        return $this->hasOne(ShuttleStatus::class, 'shuttle_id');
    }
}
