<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Inscrito;
use App\Models\Campeonato;
use App\Models\Resultado;
use Illuminate\Support\Facades\DB;


class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'pais'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];



    public function inscripcion(Campeonato $campeonato){
        return Inscrito::where('user_id',$this->id)->where('campeonato_id', $campeonato->id);
        
    }

    public function isInscrito(Campeonato $campeonato){
        $inscrito = $this->inscripcion($campeonato)->count();
        return ($inscrito > 0) ? true : false;
    }
    

    public function listadoCampeonatos(){
        return Campeonato::whereIn('id',function($query)  {
            $query->select('campeonato_id')->from('inscritos')->where('user_id',$this->id);
            });  
    }

    public function listadoCampeonatosActivos(){
        return Campeonato::where('activo','1')->whereIn('id',function($query)  {
            $query->select('campeonato_id')->from('inscritos')->where('user_id',$this->id);
            });  
    }

    public function listadoCampeonatosPropios(){
        return Campeonato::where('user_id',$this->id)->orderBy('activo')->orderBy('created_at', 'desc');  
    }

    public function getCampeonatosGanados(){
        // MYSQL 8
        $sql = "select count(*) ganados from
        (SELECT
            t.user_id,
            t.campeonato_id,
            t.puntos,
                RANK() OVER (PARTITION BY
                                t.campeonato_id
                            ORDER BY
                                t.puntos DESC) as posicion
            FROM
            (
            SELECT i.user_id user_id, c.campeonato_id campeonato_id, sum(pp.puntos) puntos 
                FROM resultados r, carreras c, posicion_puntos pp, inscritos i, campeonatos camp
            where r.carrera_id = c.id 
            and i.id = r.inscrito_id
            and camp.id = c.campeonato_id
            and camp.activo = 2
            and r.posicion = pp.posicion
            and c.cerrado = 1
            and pp.ultima = c.ultima
            group by r.inscrito_id, c.campeonato_id) as t
         ) ra
         where ra.posicion =1  and user_id =  '".$this->id."' ";

        //mysql 5
         $sql =  "select count(*) ganados from
         (SELECT
            t.user_id,
            t.campeonato_id,
            t.puntos, 
             (
        select 1 + count(*)
        from (
            SELECT i.user_id user_id, c.campeonato_id campeonato_id, sum(pp.puntos) puntos 
                FROM resultados r, carreras c, posicion_puntos pp, inscritos i, campeonatos camp
            where r.carrera_id = c.id 
            and i.id = r.inscrito_id
            and camp.id = c.campeonato_id
            and camp.activo = 2
            and r.posicion = pp.posicion
            and c.cerrado = 1
            and pp.ultima = c.ultima
            group by r.inscrito_id, c.campeonato_id) AS t1
        where 
            t1.user_id = t.user_id 
            and t1.campeonato_id = t.campeonato_id
            and t1.puntos > t.puntos

    ) as posicion
            from (
            SELECT i.user_id user_id, c.campeonato_id campeonato_id, sum(pp.puntos) puntos 
                FROM resultados r, carreras c, posicion_puntos pp, inscritos i, campeonatos camp
            where r.carrera_id = c.id 
            and i.id = r.inscrito_id
            and camp.id = c.campeonato_id
            and camp.activo = 2
            and r.posicion = pp.posicion
            and c.cerrado = 1
            and pp.ultima = c.ultima
            group by r.inscrito_id, c.campeonato_id) AS  t
            ) ra
         where ra.posicion =1  and user_id =  '".$this->id."' ";

         //dd($sql);

        $results = DB::select($sql);

        return $results[0]->ganados;
    }

    public function getResultsPosition(String $position){

        $valor = Resultado::where('posicion', $position)->whereIn('inscrito_id',function($query)  {
            $query->select('id')->from('inscritos')->where('user_id',$this->id);
            })->whereIn('carrera_id',function($query)  {
                $query->select('id')->from('carreras')->where('cerrado','1');
                })->count();  
        return $valor;
        
    }

    public function getResultsPoles(){

        $valor = Resultado::where('qualy', '1')->whereIn('inscrito_id',function($query)  {
            $query->select('id')->from('inscritos')->where('user_id',$this->id);
            })->whereIn('carrera_id',function($query)  {
                $query->select('id')->from('carreras')->where('cerrado','1');
                })->count();  
        return $valor;
        
    }

    public function getCartasPiloto(String $pilotoId){
        return Inscrito::where('carta_piloto_id', $pilotoId)->count();  
    }

    public function getAchievements(){

        $valor = Resultado::whereIn('inscrito_id',function($query)  {
            $query->select('id')->from('inscritos')->where('user_id',$this->id);
            })->whereIn('carrera_id',function($query)  {
                $query->select('id')->from('carreras')->where('cerrado','1');
                });  

        //dd($valor);
        return $valor;
        
    }

    public function getCountResults(String $field, String $valor){

        $valor = Resultado::where($field, $valor)->whereIn('inscrito_id',function($query)  {
            $query->select('id')->from('inscritos')->where('user_id',$this->id);
            })->whereIn('carrera_id',function($query)  {
                $query->select('id')->from('carreras')->where('cerrado','1');
                })->count();  
        return $valor;
        
    }

    public function getCocheHabitual(){
        $imagen = 'images/coches/coche_neutro.png';
       $sql = "SELECT coche_id
FROM inscritos i, carreras ca
where ca.campeonato_id = i.campeonato_id
and ca.cerrado = 1
and user_id =".$this->id."
group by coche_id
order by count(*)";

       /* $coches = Coche::where('id', function($query){
                        $query->select('coche_id')->from('inscritos')->where('user_id',$this->id);
                    })->whereIn('carrera_id',function($query)  {
                        $query->select('id')->from('carreras')->where('cerrado','1');
                    })->orderBy('id');*/
        $coche = DB::select($sql);
        if ($coche)
            $imagen = Coche::find($coche[0]->coche_id)->imagen;

        return  $imagen;

    }

    public function getResultsRace(String $circuitoId){

        return Resultado::whereIn('inscrito_id',function($query) use ($circuitoId)  {
            $query->select('id')->from('inscritos')->where('user_id',$this->id);
            })->whereIn('carrera_id',function($query) use ($circuitoId)  {
                $query->select('id')->from('carreras')->where('cerrado','1')->where('circuito_id',$circuitoId);
                })->count();  

    }

}
