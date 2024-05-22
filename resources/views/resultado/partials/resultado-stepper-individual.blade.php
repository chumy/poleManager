
        <input type="hidden" name="campeonato" value="{{$carrera->campeonato()->hashid}}"/>
        <input type="hidden" name="carrera" value="{{$carrera->id}}"/>
        <input type="hidden" name="resultado" value="{{$inscrito->getResultado($carrera)->id}}"/>
        


<div class=" grid grid-cols-1 grid-flow-row auto-rows-max shadow  sm:rounded-lg m-2 ">

    <!--div class="flex flex-col sticky top-0 z-10"-->
        <div class="flex-auto bg-gray-800 border border-gray-800 shadow-lg rounded-2xl p-4">
            <div class="flex align-middle">
                <div class="flex flex-col">
                    <div class="flex sm:mb-0 mb-3 justify-center items-center">
                        <img src="{{ asset($inscrito->usuario()->first()->avatar)}}" alt="{{$inscrito->usuario()->first()->name}}" class=" sm:w-20 sm:h-20 w-9 h-9 object-cover rounded-2xl">
                    </div>
                    <div class="flex flex-row items-center">    
                        <div class="w-full flex-none sm:text-lg text-sm text-center text-gray-400 font-bold leading-none">{{$inscrito->usuario()->first()->name}}</div>
                    </div>
                </div>
                @if ($carrera->campeonato()->cartas_piloto && $inscrito->usuario()->first()->bot == 0 )
                    <div class="sm:flex hidden px-4">
                            <div class="flex sm:mb-0 mb-3 justify-center items-center">
                                <img class="object-cover h-6 " src=" {{ asset($inscrito->coche()->first()->imagen)}} " alt="" loading="lazy" />
                            </div>
                    </div>
                @endif


                <div class="flex-auto pt-2 align-middle">
                    <div class="flex items-center justify-center ">
                        <img class="object-cover h-12 sm:h-24 " src=" {{ asset($inscrito->coche()->first()->imagen)}} " alt="" loading="lazy" />
                    </div>
                </div>
                @if ($carrera->campeonato()->escuderias)
                <div class="flex pt-2  align-middle">
                    <div class="flex items-center justify-center  ">
                    <img class="object-cover sm:h-20 h-10" src=" {{ asset($inscrito->escuderia()->first()->imagen)}} " alt="" loading="lazy" />
                    </div>
                </div>
                @endif
            </div>
        </div>

        <!-- Main -->
        <div class="flex-auto bg-gray-800 border border-gray-800 shadow-lg  rounded-2xl py-2 mt-2">

            
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                <div class="grid justify-start">
                    <div class="flex align-middle pl-2">
                        <div class="flex items-center justify-center ">
                            <img src="{{asset('images/pole.png')}}" class="w-9 min-w-9" alt="{{__('Qualification')}}"/>
                        </div>
                        <span class="uppercase font-medium  text-lg text-gray-400 py-2 px-5 text-center tracking-wider">{{__('Qualification')}}</span>
                    </div>
                </div>
                <div class="grid justify-items-end sm:justify-items-start pr-3 items-center">            
                    <x-counter-h max='{{$carrera->campeonato()->inscritos()->count()}}' campo='qualy' valor="{{$inscrito->getResultado($carrera)->qualy}}" indice="_{{$inscrito->id}}"></x-counter-h>
                </div>

                <div class="grid justify-start">
                    <div class="flex align-middle pl-2">
                        <div class="flex items-center justify-center ">
                            <img src="{{asset('images/wins.png')}}" class="w-9 min-w-9" alt="{{__('Position')}}"/>
                        </div>
                        <span class="uppercase font-medium  text-lg text-gray-400 py-2 px-5 text-center tracking-wider">{{__('Position')}}</span>
                    </div>
                </div>
                <div class="grid justify-items-end sm:justify-items-start pr-3 items-center">            
                    <x-counter-h max='{{$carrera->campeonato()->inscritos()->count()}}' campo='posicion' valor="{{$inscrito->getResultado($carrera)->posicion}}" indice="_{{$inscrito->id}}"></x-counter-h>
                </div>
            </div>
        </div>
        @if($inscrito->usuario()->first()->bot == 0 )
            <div class="flex-auto bg-gray-800 border border-gray-800 shadow-lg  rounded-2xl py-2 mt-2">
                <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
                    <div class="grid justify-start">
                        <div class="flex align-middle pl-2">
                            <div class="flex items-center justify-center ">
                                    <img src="{{asset('images/overtake.png')}}" class="w-9 min-w-9" alt="{{__('Overtakes')}}"/>
                                </div>
                            <span class="uppercase font-medium  text-lg text-gray-400 py-2 px-5 text-center tracking-wider">{{__('Overtakes')}}</span>
                        </div>
                    </div>
                    <div class="grid justify-items-end sm:justify-items-start pr-3 items-center">            
                        <x-counter-h max='50' campo='adelantamientos' valor="{{$inscrito->getResultado($carrera)->adelantamientos}}" indice="_{{$inscrito->id}}"></x-counter-h>
                    </div>

                    <div class="grid justify-start">
                        <div class="flex align-middle pl-2">
                            <div class="flex items-center justify-center ">
                                <img src="{{asset('images/overtake_attack.png')}}" class="w-9 min-w-9" alt="{{__('Attacked')}}"/>
                            </div>
                            <span class="uppercase font-medium  text-lg text-gray-400 py-2 px-1 text-center tracking-wider">{{__('Attacked')}}</span>
                        </div>
                    </div>
                    <div class="grid justify-items-end sm:justify-items-start pr-3 items-center">            
                        <x-counter-h max='30' campo='ataques' valor="{{$inscrito->getResultado($carrera)->ataques}}" indice="_{{$inscrito->id}}"></x-counter-h>
                    </div>
                    <div class="grid justify-start">
                        <div class="flex align-middle pl-2">
                            <div class="flex items-center justify-center ">
                                <img src="{{asset('images/overtake_defend.png')}}" class="w-9 min-w-9" alt="{{__('Defended')}}"/>
                            </div>
                            <span class="uppercase font-medium  text-lg text-gray-400 py-2 px-1 text-center tracking-wider">{{__('Defended')}}</span>
                        </div>
                    </div>
                    <div class="grid justify-items-end sm:justify-items-start pr-3 items-center">            
                        <x-counter-h max='{{$carrera->campeonato()->inscritos()->count()}}' campo='defensas' valor="{{$inscrito->getResultado($carrera)->defensas}}" indice="_{{$inscrito->id}}"></x-counter-h>
                    </div>
                    <div class="grid justify-start">
                        <div class="flex align-middle pl-2">
                            <div class="flex items-center justify-center ">
                                <img src="{{asset('images/colision.png')}}" class="w-9 min-w-9" alt="{{__('Collisions')}}"/>
                            </div>
                            <span class="uppercase font-medium  text-lg text-gray-400 py-2 px-1 text-center tracking-wider">{{__('Collisions')}}</span>
                        </div>
                    </div>
                    <div class="grid justify-items-end sm:justify-items-start pr-3 items-center">            
                        <x-counter-h max='30' campo='colisiones' valor="{{$inscrito->getResultado($carrera)->colisiones}}" indice="_{{$inscrito->id}}"></x-counter-h>
                    </div>
                </div>
            </div>

            

            <div class="flex-auto bg-gray-800 border border-gray-800 shadow-lg  rounded-2xl py-2 mt-2">
                <div class="grid grid-cols-2 sm:grid-cols-4  gap-4">
                    <div class="grid justify-start">
                        <div class="flex align-middle pl-2">
                            <div class="flex items-center justify-center ">
                                <img src="{{asset('images/averia_low_front.png')}}" class="w-9 min-w-9" alt="{{__('Light Breakdowns')}}"/>
                            </div>
                            <span class="uppercase font-medium  text-lg text-gray-400 py-2 px-1 text-center tracking-wider">{{__('Light Breakdowns')}}</span>
                        </div>
                    </div>
                    <div class="grid justify-items-end sm:justify-items-start pr-3 items-center">            
                        <x-counter-h max='2' campo='averias_leves' valor="{{$inscrito->getResultado($carrera)->averias_leves}}" indice="_{{$inscrito->id}}"></x-counter-h>
                    </div>

                    <div class="grid justify-start">
                        <div class="flex align-middle pl-2">
                            <div class="flex items-center justify-center ">
                                <img src="{{asset('images/averia_grave_front.png')}}" class="w-9 min-w-9" alt="{{__('Heavy Breakdowns')}}"/>
                            </div>
                            <span class="uppercase font-medium  text-lg text-gray-400 py-2 px-1 text-center tracking-wider">{{__('Heavy Breakdowns')}}</span>
                        </div>
                    </div>
                    <div class="grid justify-items-end sm:justify-items-start pr-3 items-center">            
                        <x-counter-h max='2' campo='averias_graves' valor="{{$inscrito->getResultado($carrera)->averias_graves}}" indice="_{{$inscrito->id}}"></x-counter-h>
                    </div>
                    <div class="grid justify-start">
                        <div class="flex align-middle pl-2">
                            <div class="flex items-center justify-center ">
                                <img src="{{asset('images/averia_low_back.png')}}" class="w-9 min-w-9" alt="{{__('Light Breakdowns Repaired')}}"/>
                            </div>
                            <span class="uppercase font-medium  text-lg text-gray-400 py-2 px-1 text-center tracking-wider">{{__('Light Breakdowns Repaired')}}</span>
                        </div>
                    </div>
                    <div class="grid justify-items-end sm:justify-items-start pr-3 items-center">            
                        <x-counter-h max='3' campo='reparaciones_leves' valor="{{$inscrito->getResultado($carrera)->reparaciones_leves}}" indice="_{{$inscrito->id}}"></x-counter-h>
                    </div>
                    <div class="grid justify-start">
                        <div class="flex align-middle pl-2">
                            <div class="flex items-center justify-center ">
                                <img src="{{asset('images/averia_grave_back.png')}}" class="w-9 min-w-9" alt="{{__('Heavy Breakdowns Repaired')}}"/>
                            </div>
                            <span class="uppercase font-medium  text-lg text-gray-400 py-2 px-1 text-center tracking-wider">{{__('Heavy Breakdowns Repaired')}}</span>
                        </div>
                    </div>
                    <div class="grid justify-items-end sm:justify-items-start pr-3 items-center">            
                        <x-counter-h max='2' campo='reparaciones_graves' valor="{{$inscrito->getResultado($carrera)->reparaciones_graves}}" indice="_{{$inscrito->id}}"></x-counter-h>
                    </div>
                </div>
            </div>
            @if ($carrera->campeonato()->desgaste)

            <div class="flex-auto bg-gray-800 border border-gray-800 shadow-lg  rounded-2xl py-2 mt-2">
                <div class="grid grid-cols-2 sm:grid-cols-4  gap-4">
                    <div class="grid justify-start">
                        <div class="flex align-middle pl-2">
                            <div class="flex items-center justify-center ">
                                <img src="{{asset('images/motor.png')}}" class="w-9 min-w-9" alt="{{__('Engine Points')}}"/>
                            </div>
                            <span class="uppercase font-medium  text-lg text-gray-400 py-2 px-1 text-center tracking-wider">{{__('Engine Points')}}</span>
                        </div>
                    </div>
                    <div class="grid justify-items-end sm:justify-items-start pr-3 items-center">            
                        <x-counter-h max='15' campo='puntos_motor' valor="{{$inscrito->getResultado($carrera)->puntos_motor}}" indice="_{{$inscrito->id}}"></x-counter-h>
                    </div>
                </div>
            </div>
            @endif
        @endif
<x-input-error :messages="$errors->newResultado->get('qualy')" class="mt-2 bg-white p-4" />
<x-input-error :messages="$errors->newResultado->get('posicion')" class="mt-2 bg-white p-4" />


        <div class="flex items-center justify-center gap-4 my-2">
        
            <div class="flex">
                <x-primary-button>{{ __('Save All') }}</x-primary-button>
            </div>
            <div class="flex px-4">
            <x-primay-link href='{{route ("campeonato.show", ["campeonato" => $carrera->campeonato()->hashid]) }}' >
            {{ __('Back') }}
            </x-primay-link>

            </div>
        </div>
    </div>
   

