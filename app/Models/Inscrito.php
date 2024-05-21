<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Campeonato;
use App\Models\Carrera;
use App\Models\User;


class Inscrito extends Model
{
    use HasFactory;

    public function campeonato()
    {
        return $this->belongsTo('App\Models\Campeonato');
    }

    public function usuario()
    {
        return $this->belongsTo('App\Models\User','user_id');
    }

    public function coche()
    {
        return $this->belongsTo('App\Models\Coche','coche_id');
    }

    public function escuderia()
    {
        return $this->belongsTo('App\Models\Escuderia','escuderia_id');
    }
    
    public function resultados()
    {
        return $this->hasMany('App\Models\Resultado');
    }

    public function carreras()
    {
       
        return $this->hasManyThrough('App\Models\Carrera', 'App\Models\Resultado',                                
                                            'inscrito_id', // Foreign key on the resultado table...
                                            'id', // Foreign key on the carrera table...
                                            'id', // Local key on the inscrito table...
                                            'carrera_id' // Local key on the resultado table...
                                        );
    }


    public function cartaEscuderia()
    {
        return $this->belongsTo('App\Models\Carta','carta_escuderia_id');
    }
    
    public function cartaPiloto()
    {
        return $this->belongsTo('App\Models\Carta','carta_piloto_id');
    }
            

    public function getResultado(Carrera $carrera){
        return $this->resultados->where('carrera_id',$carrera->id)->first();
    }

    //Posiciones
    /*
    SELECT
    t.user_id,
    t.campeonato_id,
    t.puntos,
        RANK() OVER (PARTITION BY
                        t.campeonato_id
                    ORDER BY
                        t.puntos DESC) as posicion
    FROM
    (
    SELECT i.user_id user_id, c.campeonato_id campeonato_id, sum(pp.puntos) puntos FROM resultados r, carreras c, posicion_puntos pp, inscritos i
    where r.carrera_id = c.id 
    and i.id = r.inscrito_id
    and r.posicion = pp.posicion
    and c.cerrado = 1
    and pp.ultima = c.ultima
    group by r.inscrito_id, c.campeonato_id) as t;
*/

}
