<?php

namespace App\Http\Controllers;

use App\Models\Inscrito;
use App\Models\Campeonato;
use App\Models\Coche;
use App\Models\Carta;
use App\Models\User;
use App\Models\Escuderia;
use App\Models\Bot;
use Illuminate\Http\Request;

use Auth;

class InscritoController extends Controller
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
        
        $userId = Auth::id();
        $campeonato = Campeonato::where('hashid',$hashid)->first();

        $exist= Inscrito::where('user_id', $userId)->where('campeonato_id',$campeonato->id)->count();
        if($exist > 0)
            return view('welcome'); 

        $escuderias=[];
        $coches=[];
        if($campeonato->escuderias) {
            $escuderias = $campeonato->escuderiasLibres();
            $coches = $campeonato->cochesLibres();
        }
        else        
            $coches = $campeonato->cochesLibres();     
        
        $pilotos = Carta::where('tipo',0)->get();
        $escuderias = Carta::where('tipo',1)->get();

        return view('inscripcion.new', compact('campeonato' , 'coches', 'pilotos','escuderias'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $campeonato = Campeonato::where('hashid',$request['hashid'])->first();
        $validations = [
            'coche' => 'required|numeric|not_in:0',
        ];

        if ($campeonato->cartas_piloto){
            /*
            $request->validateWithBag('newInscripcion', [
                'piloto' => 'required|numeric|not_in:0',
                ]);*/
            $validations += ['piloto' => 'required|numeric|not_in:0'];

        } 
        if ($campeonato->cartas_escuderia){

            $validations += ['escuderia' => 'required|numeric|not_in:0'];

        } 

       //dd($validations);

        $request->validateWithBag('newInscripcion', $validations);
        
        

        $userId = Auth::id();

        $inscrito = new Inscrito;
        $inscrito->user_id = $userId;
        $inscrito->campeonato_id = $campeonato->id;
        
        
        $inscrito->coche_id = $request['coche'];
        $inscrito->escuderia_id = null;

        if($campeonato->escuderias){
            $inscrito->escuderia_id = Escuderia::where('coche_id',$request['coche'])->first()->id;

        }

        if($campeonato->cartas_piloto){
            $inscrito->carta_piloto_id = $request['piloto'];
        }

        if($campeonato->cartas_escuderia){
            $inscrito->carta_escuderia_id = $request['escuderia'];
        }

        $inscrito->save();

        return redirect()->route('campeonato.show' , ['campeonato' => $campeonato->hashid]);

    }

    /**
     * Display the specified resource.
     */
    public function show(Inscrito $inscrito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inscrito $inscrito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inscrito $inscrito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Campeonato $campeonato)
    {
        //
        $user = Auth::user();


        $inscripcion = $user->inscripcion($campeonato)->delete();

        return redirect()->route('campeonato.show' , ['campeonato' => $campeonato->hashid]);

    }

     /**
     * Show the form for creating a new resource.
     */
    public function createBot(String $hashid)
    {
        //
        
        $campeonato = Campeonato::where('hashid',$hashid)->first();

        $totalBots = $campeonato->num_bots;

        $botsInscritos = $campeonato->botsInscritos()->count();
        
        
        if ($totalBots <= $botsInscritos)
            return redirect()->route('campeonato.show' , ['campeonato' => $campeonato->hashid]);

        
        
        $bots = User::where('bot',1)->whereNOTIn('id', function($query)  use ($campeonato)
                {
                    $query->select('user_id')->from('inscritos')
                        ->where('campeonato_id',$campeonato->id);
                })
                ->get();
        
       
        return view('inscripcion.new-bot', ['campeonato' => $campeonato,  'bots' => $bots ]);
        
    }

     /**
     * Store a newly created resource in storage.
     */
    public function storeBot(Request $request)
    {
        //
        $request->validateWithBag('newInscripcion', [
           'bot' => 'bail|required|numeric|not_in:0'
        ]);

        $campeonato = Campeonato::where('hashid',$request['campeonato'])->first();
        $totalBots = $campeonato->num_bots;

        
        $botsInscritos = $campeonato->botsInscritos()->count();

        

        if ($totalBots > $botsInscritos)
        {
            $bot=Bot::where('id', $request['bot'])->first();
            
            
            $inscrito = new Inscrito;
            $inscrito->user_id = $bot->id;
            $inscrito->campeonato_id = $campeonato->id;
            $inscrito->coche_id = $bot->coche_id;

            if($campeonato->escuderias){
                $escuderia_id = Escuderia::where('coche_id', $bot->coche_id)->first()->id;
                $inscrito->escuderia_id = $escuderia_id;
            }
            
            $inscrito->save();
            $botsInscritos++;
        }

        if ($totalBots == $botsInscritos)
            return redirect()->route('campeonato.show' , ['campeonato' => $campeonato->hashid]);
        
        return redirect()->route('inscripcion.bot.create' , ['campeonato' => $campeonato->hashid]);


    }

    public function destroyBot(Request $request)
    {
        
        //dd($request);
        foreach ($request['inscritos'] as $inscritoId){
            Inscrito::where('id',$inscritoId)->delete();

        }
        $campeonato = Campeonato::where('hashid',$request['campeonato'])->first();

        return redirect()->route('campeonato.show' , ['campeonato' => $campeonato->hashid]);
    }
}
