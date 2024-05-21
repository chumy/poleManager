<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use App\Models\Escuderia;
use App\Models\Carta;
use App\Models\Coche;
use App\Models\Inscrito;
use App\Models\PosicionPunto;

class Campeonato extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'num_coches',
        'num_bots',
        'num_carreras',
        'escuderias',
        'oficial',
        'hashid',
        'activo',
    ];

    public function inscritos()
    {
        return $this->hasMany('App\Models\Inscrito');
    }

    public function carreras()
    {
        return $this->hasMany('App\Models\Carrera')->orderby('orden');
    }

    public function carrerasCompletadas()
    {
        return $this->hasMany('App\Models\Carrera')->where('cerrado',1)->orderby('orden');
    }

    public function resultados()
    {
        return $this->hasManyThrough('App\Models\Resultado', 'App\Models\Carrera')->where('carreras.cerrado',1)->orderBy('carreras.orden');
    }

    public function cochesLibres(){

            // ToDo Caculo de escuderias
            return Coche::whereNOTIn('id',function($query)  {
                $query->select('coche_id')->from('inscritos')->where('campeonato_id',$this->id);
                })->get();     
    }


    public function resultadoCarrera(Carrera $carrera)
    {
        return $this->hasMany('App\Models\Carrera')->where('id',$carrera->id)->first()->resultado();
    }


    public function escuderiasLibres(){

        return Escuderia::whereNOTIn('id',function($query) 
                {
                    $query->select('escuderia_id')->from('inscritos')
                        ->where('campeonato_id',$this->id)
                        ->whereNotNull('escuderia_id')
                        ->groupBy('escuderia_id')
                        ->havingRaw('count(escuderia_id) > ?', [1]);
                })->get();    
    }

    public function botsInscritos(){
        return Inscrito::where('campeonato_id',$this->id)
                ->whereIn('user_id', function($query)  
                {
                    $query->select('id')->from('users')
                        ->where('bot',1);
                });
    }
    public function botsLibres(){
        
        // ToDo Caculo de escuderias
        if ($this->escuderias)
            return Bot::whereNOTIn('user_id', function($query)  
                {
                    $query->select('user_id')->from('inscritos')
                        ->where('campeonato_id',$this->id);
                })->whereNOTIn('coche_id',function($query)  {
                    $query->select('coche_id')->from('inscritos')
                            ->where('campeonato_id',$this->id)
                            ->groupBy('coche_id')
                            ->havingRaw('count(coche_id) > ?', [1]);;
                })->get();

        else{
         return Bot::whereNOTIn('user_id', function($query)  
                {
                    $query->select('user_id')->from('inscritos')
                        ->where('campeonato_id',$this->id);
                })->whereNOTIn('coche_id',function($query)  {
                    $query->select('coche_id')->from('inscritos')->where('campeonato_id',$this->id);
                })->get();

        }
        
    }


    public function getResultado(String $inscritoId)
    {

        $puntos = 0;
        foreach ($this->carrerasCompletadas as $resultado) {
            
            $puntos+= $resultado->getPuntos($inscritoId) ;
        }
        
        return $puntos;
        
    }

    public function getCarrerasCompletas(String $inscritoId=null)
    {
        $puntos = 0;        
        foreach ($this->carreras as $resultado) {
            $puntos+= ($resultado->cerrado == 1) ? 1: 0 ;
        }
        return $puntos;
        
    }

    public function getNextCarrera()
    {
      
        return $this->carreras->where('cerrado',0)->first();
        
    }

    public function getClasificacion()
    {

        $c = [];

        foreach ($this->inscritos as $inscrito) {
            $puntos = $this->getResultado($inscrito->id);
            array_push( $c, ( array( 'inscrito' => $inscrito, 'puntos' => $puntos )
                )
            );
        }
        //return $c;
        //asignamos posicion
        $resultado = [];
        $i = 0;
        foreach (collect($c)->sortByDesc('puntos') as $clasificacion) {
            $i++;
            $clasificacion['posicion'] = $i;
            array_push($resultado, $clasificacion);
        }
        //Log::debug($resultado);
        return collect($resultado)->sortByDesc('puntos');
    }

    public function getCreator(){
        return User::where('id',$this->user_id)->first();
    }

    public function getClasificacionEscuderias(){

        $c = [];
    

         // Calculo de puntuaciones de pilotos por escuderia

        // Array de resultados por cada inscrito
         foreach ($this->resultados->groupBy('inscrito_id') as $resultadosInscritos) {
             $puntos = 0;
             //Resultados de inscirto
             foreach ($resultadosInscritos as $parcial) {
                //dd($parcial);
                 $puntos = PosicionPunto::where('posicion', $parcial->posicion)->first()->puntos;
                 $escuderia = $parcial->inscrito()->escuderia_id;
                 array_push($c, ((object) array(
                     'puntos' => $puntos,
                     'escuderia_id' => $escuderia,
                     'carrera_id' => $parcial->carrera_id,
 
                 )));
             }
             //$escuderia = $parciales['inscrito']->escuderia;
 
         }
         //dd($c);


        //return $resultados;
        $resultadoAgrupado=collect($c)->groupBy('escuderia_id');
        $resultado=[];
        foreach ($resultadoAgrupado as $resultadoEsc) { //Carreras
            
            foreach ($resultadoEsc->groupBy('escuderia_id') as $parciales) { //resultados por escuderias
                $puntos = 0;
                foreach ($parciales as $parcial) {
                    $puntos += $parcial->puntos;
                }
                //1;
                array_push($resultado, ((object) array(
                    'puntos' => $puntos,
                    'escuderia' => Escuderia::find($parcial->escuderia_id),
                )));
            }
        }
        usort($resultado, function($a,$b){return $a->puntos - $b->puntos;});
        return array_reverse($resultado);

    }

    public function getDesgastes(Inscrito $inscrito){
        $c = [];
        //dd($this->resultados->where('inscrito_id', $inscrito->id));
        return $this->resultados->where('inscrito_id', $inscrito->id);
    }

    
}
