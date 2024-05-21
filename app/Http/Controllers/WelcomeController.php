<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Campeonato;
use App\Models\User;
use App\Models\Carta;
use Illuminate\Support\Facades\DB;

class WelcomeController extends Controller
{
      /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $campeonatos = Campeonato::where('activo','<>','0')->orderBy('updated_at', 'desc')->take(5)->get();
        $usuarios = User::where('bot','0');
        $pilotos = Carta::where('tipo','0');

        $ranking = $this->ranking('5');
        

        return view('welcome', [
            'campeonatos' => $campeonatos,
            'usuarios' => $usuarios,
            'pilotos' => $pilotos,
            'ranking' => $ranking,
        ]);
    }

    public function showRanking(){
        

        return view('ranking', [
            'ranking' => $this->ranking(10),            
        ]);

    }

    public function search(Request $request){
       
        
        if($request->ajax()){
            $output='';
            if ($request['driver'] == '1'){
                $output = $this->searchDriver($request);
            }

            if ($request['campeonato'] == '1'){
                $output = $this->searchChampionship($request);
            }
            
            return $output;
        }
        
    }

    public function searchDriver(Request $request){
               
            $output='';
            $data=User::where('name','like','%'.$request->search.'%')
                        ->where('bot',0)->get();
 
            if(count($data)>0){
                $output ='<div id="results-drivers" class="absolute left-2 mt-2 z-10 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 p-1 space-y-1">';                
             
            foreach($data as $row){
                $output .='
                <a href="'. route('user.show',['driver' => $row->id]) .'" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">'.$row->name.'</a>';
            }
                $output .= '
                     </div>';
            }
            
            return $output;

        
    }

    public function searchChampionship(Request $request){
               
        $output='';
        $data=Campeonato::where('nombre','like','%'.$request->search.'%')
                            ->orwhere('hashid','like','%'.$request->search.'%')
                            ->get();

        if(count($data)>0){
            $output ='<div id="results-championship" class="absolute left-2 mt-2 z-10 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 p-1 space-y-1">';
         
        foreach($data as $row){
            $output .='
            <a href="'.route('campeonato.show' , [ 'campeonato' => $row->hashid, 'carrera' => null, ]).'" class="block px-4 py-2 text-gray-700 hover:bg-gray-100 active:bg-blue-100 cursor-pointer rounded-md">'.$row->hashid.' - '.$row->nombre.'</a>';
        }
            $output .= '
                 </div>';
        }
        return $output;
    
    }

    public function ranking(String $limit=null){

        $sql = "select u.*, ifnull(ganados,0) ganados,ifnull(poles,0) poles, ifnull(p1.p1,0) p1, ifnull(p2.p2,0) p2, ifnull(p3,0) p3 FROM
            users u
            left join ( select user_id, count(*) ganados from
                (SELECT
                t.user_id,
                t.campeonato_id,
                t.puntos, 
             (
                select 1 + count(*)
                from (
                    SELECT i.user_id user_id, c.campeonato_id campeonato_id, sum(pp.puntos) puntos 
                        FROM resultados r, carreras c, posicion_puntos pp, inscritos i, campeonatos camp, users u
                    where r.carrera_id = c.id 
                    and i.id = r.inscrito_id
                    and camp.id = c.campeonato_id
                    and camp.activo = 2
                    and r.posicion = pp.posicion
                    and i.user_id = u.id
                    and u.bot = 0
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
                FROM resultados r, carreras c, posicion_puntos pp, inscritos i, campeonatos camp, users u
                where r.carrera_id = c.id 
                and i.id = r.inscrito_id
                and camp.id = c.campeonato_id
                and camp.activo = 2
                and i.user_id = u.id
                and u.bot = 0
                and r.posicion = pp.posicion
                and c.cerrado = 1
                and pp.ultima = c.ultima
                group by r.inscrito_id, c.campeonato_id) AS  t
            ) ra
            where ra.posicion =1
            group by user_id) as CG
        on u.id = CG.user_id
         left join (SELECT user_id, count(*) poles FROM resultados r, inscritos i, carreras c
        WHERE r.inscrito_id = i.id
        and c.id = r.carrera_id
        and c.cerrado = 1
        and r.qualy = 1
        group by user_id) as pole
        on u.id = pole.user_id
            left join (SELECT user_id, count(*) p1 FROM resultados r, inscritos i, carreras c
        WHERE r.inscrito_id = i.id
        and c.id = r.carrera_id
        and c.cerrado = 1
        and r.posicion = 1
        group by user_id) as p1
        on u.id = p1.user_id
        left join (SELECT user_id, count(*) p2 FROM resultados r, inscritos i, carreras c
        WHERE r.inscrito_id = i.id
        and c.id = r.carrera_id
        and c.cerrado = 1
        and r.posicion = 2
        group by user_id) as p2
        on u.id = p2.user_id
        left join (SELECT user_id, count(*) p3 FROM resultados r, inscritos i, carreras c
        WHERE r.inscrito_id = i.id
        and c.id = r.carrera_id
        and c.cerrado = 1
        and r.posicion = 3
        group by user_id) as p3
        on u.id = p3.user_id
        order by ifnull(ganados,0) desc, ifnull(p1.p1,0) desc, ifnull(p2.p2,0) desc, ifnull(p3,0)desc,ifnull(poles,0) desc ";

        if ($limit)
            $sql .= 'limit '.$limit;


        $results = DB::table('ranking')->paginate($limit);
        return $results;
    }
}
