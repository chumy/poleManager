
<section>
    <x-slot name="header">
        <h2 class="text-lg  text-white font-extrabold">
        {{CountryFlag::get($carrera->circuito()->country)}} {{$carrera->circuito()->nombre}} ({{$carrera->orden}}/{{$carrera->campeonato()->num_carreras}}) 
        </h2>
    </x-slot>

    <header>
    <h2 class="text-lg  text-white font-extrabold">{{ __('Add Results')}}  </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

   

    <form method="post" action="{{ route('resultado.storeAll') }}" class="mt-6 space-y-6" >
        @csrf
        <input type="hidden" name="campeonato" value="{{$carrera->campeonato()->hashid}}"/>
        <input type="hidden" name="carrera" value="{{$carrera->id}}"/>

        

<div class="flex flex-col my-6">
    <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <!--div class="shadow overflow-hidden sm:rounded-lg"-->
            <div class="shadow overflow-hidden sm:rounded-lg">
                <table class="min-w-full text-sm text-gray-400 ">
                    <thead class="bg-gray-800 text-xs uppercase font-medium">
                        <tr>
                            
                            <th scope="col" class=" px-5 py-3 text-center tracking-wider">
                                {{__('Driver')}}
                            </th>
                            <th scope="col" class="px-4 py-3 text-center tracking-wider hidden md:table-cell " >
                                {{__('Car')}}
                            </th>
                             @if ($carrera->campeonato()->escuderias)
                             <th scope="col" class="px-4 py-3 text-center tracking-wider hidden md:table-cell " >
                                {{__('Teams')}}
                            </th>
                            @endif

                            <th scope="col" class="px-4 py-3 text-center tracking-wider " >
                                {{__('Qualification')}}
                            </th>
                            <th scope="col" class="px-4 py-3 text-center tracking-wider " >
                                {{__('Position')}}
                            </th>
                            <th scope="col" class="px-4 py-3 text-center tracking-wider">
                                {{__('Overtakes')}}
                            </th>
                            <th scope="col" class="px-4 py-3 text-center tracking-wider">
                                <img src="{{asset('images/overtake_attack.png')}}" class="h-6 w-9 min-w-9" alt="{{__('Atacks Won')}}"/> 
                            </th>
                            <th scope="col" class="px-4 py-3 text-center tracking-wider">
                            <img src="{{asset('images/overtake_defend.png')}}" class="h-6 w-9 min-w-9" alt="{{__('Defends Won')}}"/> 
                            </th>
                            <th scope="col" class="px-4 py-3 text-center tracking-wider">
                            <img src="{{asset('images/averia_low_front.png')}}" class="h-6 w-6 min-h-6 min-w-6" alt="{{__('Light Breakdowns')}}"/> 
                            </th>
                            <th scope="col" class="px-4 py-3 text-center tracking-wider">
                               <img src="{{asset('images/averia_grave_front.png')}}" class="h-6 w-6 min-h-6 min-w-6" alt="{{__('Heavy Breakdowns')}}"/>
                            </th>
                            <th scope="col" class="px-4 py-3 text-center tracking-wider">
                            <img src="{{asset('images/averia_low_back.png')}}" class="h-6 w-6 min-h-6 min-w-6" alt="{{__('Light Breakdowns Repaired')}}"/> 
                            </th>
                            <th scope="col" class="px-4 py-3 text-center tracking-wider">
                            <img src="{{asset('images/averia_grave_back.png')}}" class="h-6 w-6 min-h-6 min-w-6" alt="{{__('Heavy Breakdowns Repaired')}}"/>
                            </th>
                            <th scope="col" class="px-4 py-3 text-center tracking-wider">
                            <img src="{{asset('images/colision.png')}}" class="h-6 w-6 min-h-6 min-w-6" alt="{{__('Collisions')}}"/>
                            </th>
                            @if ($carrera->campeonato()->desgaste)
                                <th scope="col" class="px-4 py-3 text-left tracking-wider">
                                <img src="{{asset('images/motor.png')}}" class="h-6 w-6 min-h-6 min-w-6" alt=" {{__('Engine Points')}}"/>
                                   
                                </th>
                            @endif
                        </tr>
                    </thead>

                    <tbody class="bg-gray-800">
                        

                        @foreach ($carrera->campeonato()->inscritos()->get() as $inscrito)
                         
                        <tr class="{{($loop->odd) ? 'bg-black bg-opacity-20' :'' }}">
                            <td class="flex px-4 py-4 whitespace-nowrap ">
       

                                <div class="flex items-center text-sm">
                                    <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full" src="{{ asset($inscrito->usuario()->first()->avatar)}} " alt="" loading="lazy" />
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                    </div>
                                    <div>
                                    <p class="font-semibold">{{$inscrito->usuario()->first()->name}}</p>
                                    <p class="text-xs text-gray-600">{{$inscrito->id}}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4 whitespace-nowrap items-center hidden md:table-cell">
                            <img class="object-cover h-6 " src=" {{ asset($inscrito->coche()->first()->imagen)}} " alt="" loading="lazy" />
                            </td>
                            @if ($carrera->campeonato()->escuderias)
                            <td class="px-4 py-4 whitespace-nowrap hidden md:table-cell">
                                <img class="object-cover h-6 " src=" {{ asset($inscrito->escuderia()->first()->imagen)}} " alt="" loading="lazy" />
                            </td>
                            @endif
                            <td class="px-1 py-4 whitespace-nowrap">
                                <x-counter-input name="qualy[{{$inscrito->id}}]" max="{{$carrera->campeonato()->num_coches}}" clase="qualy"/>  
                            </td>
                            <td class="px-1 py-4 whitespace-nowrap">
                                <x-counter-input name="posicion[{{$inscrito->id}}]" max="{{$carrera->campeonato()->num_coches}}" clase=""/>  
                            </td>
                            <td class="px-1 py-4 whitespace-nowrap">
                                <x-counter-input name="adelantamientos[{{$inscrito->id}}]" max="75" clase=""/>  
                            </td>
                            <td class="px-1 py-4 whitespace-nowrap">
                                <x-counter-input name="ataques[{{$inscrito->id}}]" max="75" clase=""/>  
                            </td>
                            <td class="px-1 py-4 whitespace-nowrap">
                                <x-counter-input name="defensas[{{$inscrito->id}}]" max="75" clase=""/>  
                            </td>
                            <td class="px-1 py-4 whitespace-nowrap">
                                <x-counter-input name="averias_leves[{{$inscrito->id}}]" max="4" clase=""/>  
                            </td>
                            <td class="px-1 py-4 whitespace-nowrap">
                                <x-counter-input name="averias_graves[{{$inscrito->id}}]" max="2" clase=""/>  
                            </td>
                            <td class="px-1 py-4 whitespace-nowrap">
                                <x-counter-input name="reparaciones_leves[{{$inscrito->id}}]" max="4" clase=""/>  
                            </td>
                            <td class="px-1 py-4 whitespace-nowrap">
                                <x-counter-input name="reparaciones_graves[{{$inscrito->id}}]" max="2" clase=""/>  
                            </td>
                            <td class="px-1 py-4 whitespace-nowrap">
                                <x-counter-input name="colisiones[{{$inscrito->id}}]" max="75" clase=""/>  
                            </td>
                           
                            @if ($carrera->campeonato()->desgaste)
                            <td class="px-1 py-4 whitespace-nowrap">
                                <x-counter-input name="puntos_motor[{{$inscrito->id}}]" max="15" clase=""/>  
                            </td> 
                            @endif                        
                        </tr>

                        @endforeach
                      
                     
                    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<x-input-error :messages="$errors->newResultado->get('qualy')" class="mt-2 bg-white p-4" />
<x-input-error :messages="$errors->newResultado->get('posicion')" class="mt-2 bg-white p-4" />

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
            <div class="px-4">
            <x-primay-link href='{{route ("campeonato.show", ["campeonato" => $carrera->campeonato()->hashid]) }}' >
            {{ __('Back') }}
</x-primay-link>

            </div>
        </div>
    </form>

  
</section>
