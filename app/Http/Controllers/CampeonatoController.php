<?php

namespace App\Http\Controllers;

use App\Models\Campeonato;
use App\Models\Carrera;
use App\Models\Inscrito;
use App\Models\Resultado;
use App\Models\PosicionPunto;
use Auth;
use Illuminate\Http\Request;
use Hashids\Hashids;
use Carbon\Carbon;

class CampeonatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();
        

        return view('campeonato.listado', [
            'campeonatos' => $user->listadoCampeonatos(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
       
        return view('campeonato.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
         //dd($request);
     
         $userId = Auth::id();
        $request->validateWithBag('newCampeonato', [
            'nombre' => 'required',
            'descripcion' => 'required',
            'num_coches'  => 'bail|required|numeric|min:2|max:6',
            'num_carreras' => 'bail|required|numeric|min:1|max:10',
            'num_bots' => 'bail|required|numeric|min:0|max:5'
        ]);

        $current_date_time = Carbon::now()->toDateTimeString(); 

        $stringhash = $request->nombre.$request->descripcion.$current_date_time;

        
        $hashids = new Hashids($stringhash);
        $hashid= $hashids->encode(1, 2, 3); 
        
        $campeonato = new Campeonato;
        $campeonato->fill($request->all());
        $campeonato->escuderias = $request->has('escuderias');
        $campeonato->desgaste = $request->has('desgaste');
        $campeonato->reglajes = $request->has('reglajes');
        $campeonato->cartas_escuderia = $request->has('cartas_escuderia');
        $campeonato->cartas_piloto = $request->has('cartas_piloto');
        $campeonato->estress = $request->has('estress');
        $campeonato->hashid= $hashid;
        $campeonato->user_id= $userId;
        $campeonato->save();

        return redirect()->route('carreras.create' , [$hashid ]);

    }

    /**
     * Display the specified resource.
     */
    public function show(String $hashid, String $carrera=null)
    {
        //

        $campeonato = Campeonato::where('hashid',$hashid)->first();
        $inscritos = $campeonato->inscritos()->get();

        if ($carrera)
            $carrera = Carrera::find($carrera)->orden -1;
        else
            $carrera = 0;
            //$carrera = $campeonato->carreras()->get()->find($carrera);

        //dd($campeonato->getClasificacion()->first()['inscrito']);
        
        //dd($campeonato->resultadoCarrera($carrera)->get()[0]->inscrito()->first());
        //dd($campeonato->resultadoCarrera($carrera)->get()[0]->qualy);
        
        
        
       // $puntos = $campeonato->getResultado(1);
     
        
        return view('campeonato.show', [
            'campeonato' => $campeonato, 
            'carreraSel' => $carrera ,]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Campeonato $campeonato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Campeonato $campeonato)
    {
        //
        $valor=$request['atributo'];
        $campeonato->$valor = ($campeonato[$valor] == 1) ? 0 : 1;

        //borrar registrados
        $campeonato->inscritos()->delete();

        $campeonato->save();

        //dd($campeonato);

        return redirect()->route('campeonato.show' , ['campeonato' => $campeonato->hashid, ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campeonato $campeonato)
    {
        //dd($campeonato);
        $campeonato->carreras()->delete();
        $campeonato->inscritos()->delete();
        $campeonato->resultados()->delete();
        $campeonato->delete();       
        return redirect()->route('dashboard');
    }

    public function start(String $hashid)
    {
        //
        
        $campeonato = Campeonato::where('hashid',$hashid)->first();

        foreach ($campeonato->carreras()->get() as $carrera){
            foreach ($campeonato->inscritos()->get() as $inscrito){

                $resultado = new Resultado;
                $resultado->carrera_id = $carrera->id;
                $resultado->inscrito_id = $inscrito->id;
                $resultado->save();
            }
        }

        $campeonato->activo = 1;
        $campeonato->save();
        
        return redirect()->route('campeonato.show' , [ 'campeonato' => $hashid, 
        'carrera' => null, ]);
        
    }

  
}
