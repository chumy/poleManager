<?php

namespace App\Http\Controllers;

use App\Models\Carrera;
use App\Models\Campeonato;
use App\Models\Circuito;
use Illuminate\Http\Request;
use Auth;

class CarreraController extends Controller
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
    public function create(String $hashid)
    {
        //
//        if ($request->session()->exists('campeonato')) {
        $userId = Auth::id();
        $campeonato = Campeonato::where('hashid',$hashid)->get()[0];

        If ($userId != $campeonato->user_id)
            return Redirect::to('/'); 
        
        $circuitos = Circuito::all();
        return view('carreras.create', [
            'campeonato' => $campeonato,
            'circuitos' => $circuitos,
        ]);
          
    //    }
        
        
        

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $campeonato = Campeonato::where('hashid',$request['campeonato'])->get()[0];
        $userId = Auth::id();

        if ($userId != $campeonato->user_id)
            return view('welcome'); 

        $rules = [];
        
        for ($i = 1; $i <= $campeonato->num_carreras; $i++){

            $rules['c'.$i] = 'required|numeric|not_in:0';

        }
        
        $request->validateWithBag('newCampeonato', $rules);

        for ($i = 1; $i <= $campeonato->num_carreras; $i++){
            $carrera = new Carrera;
            $carrera->orden = $i;
            $carrera->campeonato_id = $campeonato->id;
            $carrera->circuito_id = $request['c'.$i];
            $carrera->ultima = ($i == $campeonato->num_carreras ) ? true: false;
            $carrera->save();
        }

        return redirect()->route('campeonato.show', ['campeonato'=> $campeonato->hashid ]);
        return view('campeonato.show')->with( ['campeonato' => $campeonato, 'inscritos' => []]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Carrera $carrera)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Carrera $carrera)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Carrera $carrera)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Carrera $carrera)
    {
        //
    }

 

}
