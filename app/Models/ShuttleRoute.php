<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShuttleRoute extends Model
{
    protected $table = 'shuttle_routes';
    protected $fillable = ['route', 'order'];
    
    public function buses()
    {
        return $this->hasMany(ShuttleBus::class, 'route_id');
    }
}

