<?php

namespace Infraestructura;

use Illuminate\Database\Eloquent\Model;

class Ruta extends Model
{
    protected $table = 'rutas';
    
    protected $fillable = 
    [
        'destino_id','kilome',
        'dest1','k1','dest2','k2',
        'dest3','k3','dest4','k4',
        'dest5','k5','adicional','total','viaje_id'
    ];
    //cada ruta puede estar con un solo viaje
    public function viaje()
    {
        return $this->belongsTo('Infraestructura\Viaje');
    }
}