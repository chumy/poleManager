<section>


<h2 class="sm:text-lg text-md font-medium  text-amber-500">
    @if ($campeonato->escuderias)
            {{ __("Driver's Standings") }}
    @else
        {{ __("Championship's Standings") }}
    @endif
            
</h2>
<div class="flex flex-col">
    <div class="shadow overflow-hidden sm:rounded-lg bg-gray-800 ">
     

        @if ($campeonato->desgaste + $campeonato->cartas_piloto + $campeonato->cartas_escuderia == 3)
            <div class="grid sm:grid-cols-8 grid-cols-2 bg-gray-800 text-xs  font-medium text-gray-400 ">
        @elseif ($campeonato->desgaste + $campeonato->cartas_piloto + $campeonato->cartas_escuderia == 2)
            <div class="grid sm:grid-cols-7 grid-cols-2 bg-gray-800 text-xs  font-medium text-gray-400 ">
        @elseif ($campeonato->desgaste + $campeonato->cartas_piloto + $campeonato->cartas_escuderia == 1)
            <div class="grid sm:grid-cols-6 grid-cols-2 bg-gray-800 text-xs  font-medium text-gray-400 ">
        @else
            <div class="grid sm:grid-cols-5 grid-cols-2 bg-gray-800 text-xs  font-medium text-gray-400 ">
        @endif
            <div class="hidden sm:grid place-items-center px-1 py-3  tracking-wider border-b-2">
            {{__('#')}}
            </div>
            <div class="grid place-items-center px-5 py-3  tracking-wider border-b-2 uppercase">
            {{__('Driver')}}
            </div>
            @if ($campeonato->escuderias)
            <div class="hidden sm:grid place-items-center px-5 py-3 text-center tracking-wider border-b-2 uppercase">
            {{__('Teams')}}
            </div>
            @else
            <div class="hidden sm:grid place-items-center px-5 py-3 text-center tracking-wider border-b-2 uppercase">
                {{__('Car')}} 
                </div>
            @endif
            @if ($campeonato->cartas_piloto)
                <div class="hidden sm:grid place-items-center px-5 py-3 text-center tracking-wider border-b-2 uppercase">
                    {{__('Dirver Card')}}
                </div>
            @endif
            @if ($campeonato->cartas_escuderia)
                <div class="hidden sm:grid place-items-center px-5 py-3 text-center tracking-wider border-b-2 uppercase">
                    {{__('Team Card')}}
                </div>
            @endif
            <div class="hidden sm:grid place-items-center px-5 py-3 text-center tracking-wider border-b-2 uppercase">
            {{__('Races')}}
            </div>
            <div class="grid place-items-center px-5 py-3 text-center tracking-wider border-b-2 uppercase">
            {{__('Points')}}
            </div>
            @if ($campeonato->desgaste)
            <div class="hidden sm:grid place-items-center px-5 py-3 text-center tracking-wider border-b-2 uppercase">
            {{__('Engine Status')}}
            </div>
            @endif
    

            @foreach ($campeonato->getClasificacion() as $resultado)
                <div class="hidden sm:grid place-items-center px-5 py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }} pl-4 text-center ">
                    {{$resultado['posicion']}}
                </div>
                <div class="grid place-items-center px-5 py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }} pl-4 text-center">
                    <div class="flex items-center text-sm">
                        <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                        <img class="object-cover w-full h-full rounded-full" src="{{ asset($resultado['inscrito']->usuario()->first()->avatar)}} " alt="" loading="lazy" />
                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                        </div>
                        <div>
                        <p class="font-semibold">{{$resultado['inscrito']->usuario()->first()->name}}</p>
                        <p class="text-xs text-gray-600">{{($resultado['inscrito']->usuario()->first()->bot == 1) ? 'Bot' : CountryFlag::get('ES')}}  </p>
                        </div>
                    </div>
                </div>
                
                @if ($campeonato->escuderias)
                    <div class="hidden sm:grid place-items-center px-5 py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }} pl-4 text-center">
                        <img class="object-cover h-6 " src=" {{ asset($resultado['inscrito']->escuderia()->first()->imagen)}} " alt="" loading="lazy" />
                    </div>
                @else
                    <div class="hidden sm:grid place-items-center px-5 py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }} pl-4 text-center">
                        <img class="object-cover h-6 " src=" {{ asset($resultado['inscrito']->coche()->first()->imagen)}} " alt="" loading="lazy" />
                    </div>
                @endif
                @if ($campeonato->cartas_piloto )
                    <div class="hidden sm:grid place-items-center px-5 py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }} pl-4 text-center">
                        @if (!$resultado['inscrito']->usuario()->first()->bot)
                            <img class="object-cover h-6 " src=" {{ asset ($resultado['inscrito']->cartaPiloto()->first()->imagen) }} " alt="" loading="lazy" />
                        @endif
                    </div>
                @endif
                @if ($campeonato->cartas_escuderia)
                    <div class="hidden sm:grid place-items-center px-5 py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }} pl-4 text-center">
                        {{ $resultado['inscrito']->cartaEscuderia()->first()->nombre }} 
                    </div>
                @endif
                    <div class="hidden sm:grid place-items-center px-5 py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }} pl-4 text-center">
                        {{$campeonato->getCarrerasCompletas($resultado['inscrito']->id)}}
                    </div>
                    <div class="grid place-items-center px-5 py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }} pl-4 text-center">
                        {{$campeonato->getResultado($resultado['inscrito']->id)}}
                    </div>
                @if ($campeonato->desgaste)
                    <div class="hidden sm:grid place-items-center px-5 py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }} pl-4 text-center">
                        <div class="flex">
                            @foreach ($campeonato->getDesgastes($resultado['inscrito']) as $desgaste)
                                @if ($resultado['inscrito']->usuario()->first()->bot == 0)
                                    @if ($desgaste->puntos_motor == 0)
                                        <svg class="w-4 fill-current text-red-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                                        </svg>            
                                    @else
                                        <svg class="w-4 fill-current text-green-600" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                        </svg>
                                    @endif
                                @endif
                            @endforeach
                            
                        </div>                    
                    </div>
                @endif

            @endforeach
        
        </div>        
    </div>     
</div>     



<!-- Component End  -->

 
</section>