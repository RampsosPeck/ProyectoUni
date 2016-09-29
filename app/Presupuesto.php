<?php

namespace Infraestructura;

use Illuminate\Database\Eloquent\Model;
use Infraestructura\Viaje;
use Infraestructura\Ruta;
class Presupuesto extends Model
{
    protected $table = 'presupuestos';
    protected $fillable = ['vehiculo','chofer','encargado','entidad','fecha_sa','division1',
                            'viaje_id','combustible1','cantidad1','precio1','total1C',
                            'cantidad2','precio2','total2VC','cantidad3','precio3','total3VP','cantidad4',
                            'precio4','total4VF','cantidad5','precio5','total5P','cantidad6','precio6',
                            'total6M','cantidad7','precio7','total7G','total8T','responsable',
                            'materia','sigla','ndocentes','hsalida','hllegada','p1','r1','c1','t1',
                            'p2','r2','c2','t2','p3','c3','t3','tt','diferencia','idv'];
    
    //Muchos presupuestos pueden ser de unn solo viaje
    public function viaje()
    {
        return $this->belongsTo('Infraestructura\Viaje');
    }
    //un presupuesto solo puede tener una ruta
    public function ruta()
    {
        return $this->hasOne('Infraestructura\Ruta');
    }

}
