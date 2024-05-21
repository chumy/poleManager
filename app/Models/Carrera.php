<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PosicionPunto;

class Carrera extends Model
{
    use HasFactory;

    
    public function circuito()
    {
        return $this->belongsTo('App\Models\Circuito')->first();
    }

    public function campeonato()
    {
        return $this->belongsTo('App\Models\Campeonato')->first();
    }
    
    public function resultado()
    {
        return $this->hasMany('App\Models\Resultado');
    }

    public function inscritos()
    {
        return $this->hasManyThrough('App\Models\Inscrito','App\Models\Resultado',
        
                                            'carrera_id', // Foreign key on the resultado table...
                                            'id', // Foreign key on the carrera table...
                                            'id', // Local key on the inscrito table...
                                            'inscrito_id' // Local key on the resultado table...
                                        );
    }


    
   

    public function getPuntos(String $inscritoId)
    {
        $posicion = $this->resultado->where('inscrito_id',$inscritoId)->first()->posicion;
        return PosicionPunto::where('posicion',$posicion)->where('ultima',$this->ultima)->first()->puntos;
    }

    public function getQualy(String $inscritoId)
    {
        return  $this->resultado->where('inscrito_id',$inscritoId)->first()->qualy;
    }


}
