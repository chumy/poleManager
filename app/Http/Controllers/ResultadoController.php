<?php

namespace App\Http\Controllers;

use App\Models\Resultado;
use App\Models\Campeonato;
use App\Models\Carrera;
use App\Models\Inscrito;
use Illuminate\Http\Request;
use App\Rules\Qualy;
use App\Rules\Posicion;
use Auth;


class ResultadoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Carrera $carrera)
    {
        //Check Owner
        $user = Auth::user();
        $creador = $carrera->campeonato()->user_id;

        $inscrito = $carrera->resultado()->first()->inscrito()->getResultado($carrera);
        //dd($inscrito);


        return view('resultado.create', ['carrera' => $carrera, 'campeonato' => $carrera->campeonato()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $user = Auth::user();


        $carrera = Carrera::find($request['carrera']);
        $inscrito = Inscrito::find($request['inscrito']);
        
            
        $resultado = Resultado::where('carrera_id',$request['carrera'])->where('inscrito_id', $request['inscrito'])->first();
        $resultado->qualy = $request['qualy'];
        $resultado->posicion = $request['posicion'];
        $resultado->adelantamientos = $request['adelantamientos'];
        $resultado->ataques = $request['ataques'];
        $resultado->defensas = $request['defensas'];
        $resultado->averias_leves = $request['averias_leves'];
        $resultado->averias_graves = $request['averias_graves'];
        $resultado->reparaciones_leves = $request['reparaciones_leves'];
        $resultado->reparaciones_graves = $request['reparaciones_graves'];
        $resultado->colisiones = $request['colisiones'];
        $resultado->puntos_motor = $request['puntos_motor'];

        //dd($resultado);
        $resultado->save();
        
        if ($user->id == $carrera->campeonato()->user_id){
            return redirect()->route('resultado.show' , 
                                        [ 'inscrito' => $inscrito, 
                                          'carrera' => $carrera, ]);

        }
        
        return redirect()->route('campeonato.show' , 
                                    [ 'campeonato' => $carrera->campeonato()->hashid, 
                                    'carrera' => $carrera->id, ]);
    }

     /**
     * Store a newly created resource in storage.
     */
    public function storeAll(Request $request)
    {
        //
        //dd($request);
        /* $request->validateWithBag('newResultado', [
            'qualy' => ['required', new Qualy],
            'qualy.*' => 'required|distinct',
            'posicion' => ['required', new Posicion],
            'posicion.*' => 'required|distinct',
        ]);*/


        $campeonato = Campeonato::where('hashid',$request['campeonato'])->first();
        $carrera = Carrera::find($request['carrera']);
        
        foreach ($campeonato->inscritos()->get() as $inscrito){

            
            $resultado = Resultado::where('carrera_id',$request['carrera'])->where('inscrito_id', $inscrito->id)->first();
            $resultado->qualy = $request['qualy_'.$inscrito->id];
            $resultado->posicion = $request['posicion_'.$inscrito->id];
            $resultado->adelantamientos = $request['adelantamientos_'.$inscrito->id];
            $resultado->ataques = $request['ataques_'.$inscrito->id];
            $resultado->defensas = $request['defensas_'.$inscrito->id];
            $resultado->averias_leves = $request['averias_leves_'.$inscrito->id];
            $resultado->averias_graves = $request['averias_graves_'.$inscrito->id];
            $resultado->reparaciones_leves = $request['reparaciones_leves_'.$inscrito->id];
            $resultado->reparaciones_graves = $request['reparaciones_graves_'.$inscrito->id];
            $resultado->colisiones = $request['colisiones_'.$inscrito->id];
            $resultado->puntos_motor = $request['puntos_motor_'.$inscrito->id];

            //dd($resultado);
            $resultado->save();
        }
        

        $carrera->save();


        return redirect()->route('campeonato.show' , 
                                    [ 'campeonato' => $campeonato->hashid, 
                                    'carrera' => $carrera->id, ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(Carrera $carrera, Inscrito $inscrito)
    {
        //
        
        $resultado = Resultado::where('carrera_id',$carrera->id)->where('inscrito_id', $inscrito->id)->first();

        return view('resultado.show', compact(['carrera', 'inscrito','resultado']));
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Resultado $resultado)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function check(Carrera $carrera)
    {
        //
        //dd($carrera->resultado()->get());

        $qualy=[];
        $posicion=[];
        $errores=[];
        foreach ($carrera->resultado()->get() as $resultado){
            array_push($qualy,$resultado->qualy);
            if ($resultado->posicion > 0)
                array_push($posicion,$resultado->posicion);
        }

        $qualyUnique = array_unique($qualy);
        
        if (sizeof($qualyUnique) == 1 && $qualyUnique[0] == '0'){
            array_push($errores,'Qualification Not Set');
        }
          
        if (sizeof($qualyUnique) != $carrera->inscritos()->count()){
            array_push($errores,'Duplicated Qualification Positions');
        }

        if (in_array("0", $qualyUnique)){
            array_push($errores,'Empty Qualification Position');
        }

        $posUnique = array_unique($posicion);

        if (sizeof($posUnique) != sizeof($posicion)){
            array_push($errores,'Duplicated Finish Positions');
        }

        if (sizeof($posUnique) == 0){
            array_push($errores,'Finish Positions Not Set');
        }
        
        if (sizeof($errores) == 0 )
        {
            
            
            $carrera->cerrado = 1;
            $carrera->save();

            
            $campeonato = $carrera->campeonato();
            $totalCarreras = $campeonato->carreras()->count();
            $carrerasCerradas = $campeonato->carreras()->where('cerrado','1')->count();
            if ($totalCarreras == $carrerasCerradas)
            {
                $campeonato->activo = 2;
                $campeonato->save();
            }
        }
        
        return redirect()->route('campeonato.show' , 
                                    [ 'campeonato' => $carrera->campeonato()->hashid, 
                                    'carrera' => $carrera->id, ])->withErrors($errores);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resultado $resultado)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resultado $resultado)
    {
        //
    }
}
