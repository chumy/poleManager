

<!--div class="flex ">
    <div class="shadow overflow-x-auto sm:-mx-6 lg:-mx-8 rounded-lg bg-gray-800 ">
        <div class="grid grid-cols-{{13 + $campeonato->desgaste + $campeonato->escuderias}} bg-gray-800 text-xs uppercase font-medium text-gray-400  ">
            <div class="grid col-span-2 place-items-center py-3  tracking-wider border-b-2  ">
                {{__('Driver')}}
            </div>
            <div class="grid place-items-center  py-3 text-center tracking-wider border-b-2 ">
                {{__('Car')}}
            </div>
            @if ($campeonato->escuderias)
                <div class="grid place-items-center  py-3 text-center tracking-wider border-b-2 ">
                    <img src="{{asset('images/escuderias.png')}}" class="w-9 min-w-9" alt="{{__('Teams')}}" title="{{__('Teams')}}"/> 
                </div>
            @endif
            <div class="grid place-items-center  py-3 text-center tracking-wider border-b-2 ">
                <img src="{{asset('images/pole.png')}}" class="w-9 min-w-9" title="{{__('Pole')}}" alt="{{__('Pole')}}"/> 
            </div>
            <div class="grid place-items-center  py-3 text-center tracking-wider border-b-2 ">
                <img src="{{asset('images/wins.png')}}" class="w-9 min-w-9" alt="{{__('Position')}}" title="{{__('Position')}}"/>
            </div>
            <div class="grid place-items-center  py-3 text-center tracking-wider border-b-2 ">
                <img src="{{asset('images/overtake.png')}}" class="w-9 min-w-9" alt="{{__('Overtakes')}}" title="{{__('Overtakes')}}"/> 
            </div>
            <div class="grid place-items-center  py-3 text-center tracking-wider border-b-2 ">
                <img src="{{asset('images/overtake_attack.png')}}" class="h-6 w-9 min-w-9" alt="{{__('Atacks Won')}}" title="{{__('Atacks Won')}}"/> 
            </div>
            <div class="grid place-items-center  py-3 text-center tracking-wider border-b-2 ">
                <img src="{{asset('images/overtake_defend.png')}}" class="w-9 min-w-9" alt="{{__('Defends Won')}}" title="{{__('Defends Won')}}"/>  
            </div>
            <div class="grid place-items-center  py-3 text-center tracking-wider border-b-2 ">
                <img src="{{asset('images/averia_low_front.png')}}" class="w-6 min-h-6 min-w-6" alt="{{__('Light Breakdowns')}}" title="{{__('Light Breakdowns')}}"/> 
            </div>
            <div class="grid place-items-center  py-3 text-center tracking-wider border-b-2 ">
                <img src="{{asset('images/averia_grave_front.png')}}" class="h-6 w-6 min-h-6 min-w-6" alt="{{__('Heavy Breakdowns')}}" title="{{__('Heavy Breakdowns')}}"/>   
            </div>
            <div class="grid place-items-center  py-3 text-center tracking-wider border-b-2 ">
                <img src="{{asset('images/averia_low_back.png')}}" class="h-6 w-6 min-h-6 min-w-6" alt="{{__('Light Breakdowns Repaired')}}" title="{{__('Light Breakdowns Repaired')}}"/> 
            </div>
            <div class="grid place-items-center  py-3 text-center tracking-wider border-b-2 ">
                <img src="{{asset('images/averia_grave_back.png')}}" class="h-6 w-6 min-h-6 min-w-6" alt="{{__('Heavy Breakdowns Repaired')}}" title="{{__('Heavy Breakdowns Repaired')}}"/>                
            </div>
            <div class="grid place-items-center  py-3 text-center tracking-wider border-b-2 ">
                <img src="{{asset('images/colision.png')}}" class="h-6 w-6 min-h-6 min-w-6" alt="{{__('Collisions')}}" title="{{__('Collisions')}}"/>
            </div>
            @if ($campeonato->desgaste)
            <div class="grid place-items-center  py-3 text-center tracking-wider border-b-2 ">
                <img src="{{asset('images/motor.png')}}" class="h-6 w-6 min-h-6 min-w-6" alt=" {{__('Engine Points')}}" title=" {{__('Engine Points')}}"/>
            </div>
             @endif
            
        



             @foreach ($campeonato->resultadoCarrera($carrera)->get() as $resultado)
             <div class="grid col-span-2 place-items-center  py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }}  text-center">
                <div class="flex items-center text-sm">
                    <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                        <img class="object-cover w-full h-full rounded-full" src="{{ asset($resultado->inscrito()->usuario()->first()->avatar)}} " alt="" loading="lazy" />
                        <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                    </div>
                    <div>
                        <p class="font-semibold">{{$resultado->inscrito()->usuario()->first()->name}}</p>
                        <p class="text-xs text-gray-600">{{($resultado->inscrito()->usuario()->first()->bot == 1) ? 'Bot' : CountryFlag::get('ES')}}</p>
                    </div>
                </div>
            </div>
             <div class="grid place-items-center  py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }}  text-center">
                <img class="object-cover h-6 " src=" {{ asset($resultado->inscrito()->coche()->first()->imagen)}} " alt="" loading="lazy" />
            </div>
            @if ($campeonato->escuderias)
                <div class="grid place-items-center  py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }}  text-center">
                    <img class="object-cover h-6 " src=" {{ asset($resultado->inscrito()->escuderia()->first()->imagen)}} " alt="" loading="lazy" />
                </div>
            @endif
            <div class="grid place-items-center  py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }}  text-center">
                <x-input-label>{{$resultado->qualy}}</x-input-label>
            </div>
            <div class="grid place-items-center  py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }}  text-center">
                <x-input-label>{{$resultado->posicion}}</x-input-label> 
            </div>
            <div class="sm:grid place-items-center  py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }}  text-center">
                <x-input-label>{{$resultado->adelantamientos}}</x-input-label> 
            </div>
            <div class="sm:grid place-items-center  py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }}  text-center">
                <x-input-label>{{$resultado->ataques}}</x-input-label>  
            </div>
            <div class="sm:grid place-items-center  py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }}  text-center">
                <x-input-label>{{$resultado->defensas}}</x-input-label>   
            </div>
            <div class="sm:grid place-items-center  py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }}  text-center">
                <x-input-label>{{$resultado->averias_leves}}</x-input-label>   
            </div>
            <div class="sm:grid place-items-center  py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }}  text-center">
                <x-input-label>{{$resultado->averias_graves}}</x-input-label>   
            </div>
            <div class="sm:grid place-items-center  py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }}  text-center">
                <x-input-label>{{$resultado->reparaciones_leves}}</x-input-label> 
            </div>
            <div class="sm:grid place-items-center  py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }}  text-center">
                <x-input-label>{{$resultado->reparaciones_graves}}</x-input-label>
            </div>
            <div class="sm:grid place-items-center  py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }}  text-center">
                <x-input-label>{{$resultado->colisiones}}</x-input-label>
            </div>
            @if ($campeonato->desgaste)
            <div class="sm:grid place-items-center  py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }}  text-center">
                <x-input-label>{{$resultado->puntos_motor}}</x-input-label>    
            </div>
            @endif
            @endforeach

           
        </div> 
    </div> 
</div--> 

<div class="flex flex-col">
    <div class=" overflow-x-auto sm:-mx-6 lg:-mx-8">
        <div class=" align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <!--div class="shadow overflow-rounded-lg"-->
            <div class="shadow  rounded-lg">
                <table class="min-w-full text-sm text-gray-400 ">
                    <thead class="bg-gray-800 text-xs uppercase font-medium border-b-2  ">
                        <tr>
                            
                            <th scope="col" class=" px-5 py-3 text-center tracking-wider">
                                {{__('Driver')}}
                            </th>
                            <!--th scope="col" class="px-4 py-3 text-center tracking-wider hidden md:table-cell " >
                                {{__('Car')}}
                            </th>
                             @if ($campeonato->escuderias)
                             <th scope="col" class="px-4 py-3 text-center tracking-wider hidden md:table-cell " >
                             <img src="{{asset('images/escuderias.png')}}" class="w-9 min-w-9" alt="{{__('Teams')}}" title="{{__('Teams')}}"/> 
                            </th>
                            @endif
                            -->
                            <th scope="col" class="px-4 py-3 text-center tracking-wider " >
                                <img src="{{asset('images/pole.png')}}" class="w-9 min-w-9" title="{{__('Pole')}}" alt="{{__('Pole')}}"/> 
                            </th>
                            <th scope="col" class="px-4 py-3 text-center tracking-wider " >
                                <img src="{{asset('images/wins.png')}}" class="w-9 min-w-9" alt="{{__('Position')}}" title="{{__('Position')}}"/>
                            </th>
                            <th scope="col" class="px-4 py-3 text-center tracking-wider">
                                <img src="{{asset('images/overtake.png')}}" class="w-9 min-w-9" alt="{{__('Overtakes')}}" title="{{__('Overtakes')}}"/> 
                            </th>
                            <th scope="col" class="px-4 py-3 text-center tracking-wider">
                                <img src="{{asset('images/overtake_attack.png')}}" class="h-6 w-9 min-w-9" alt="{{__('Atacks Won')}}" title="{{__('Atacks Won')}}"/> 
                            </th>
                            <th scope="col" class="px-4 py-3 text-center tracking-wider">
                            <img src="{{asset('images/overtake_defend.png')}}" class="w-9 min-w-9" alt="{{__('Defends Won')}}" title="{{__('Defends Won')}}"/> 
                            </th>
                            <th scope="col" class="px-4 py-3 text-center tracking-wider">
                            <img src="{{asset('images/averia_low_front.png')}}" class="w-6 min-h-6 min-w-6" alt="{{__('Light Breakdowns')}}" title="{{__('Light Breakdowns')}}"/> 
                            </th>
                            <th scope="col" class="px-4 py-3 text-center tracking-wider">
                               <img src="{{asset('images/averia_grave_front.png')}}" class="h-6 w-6 min-h-6 min-w-6" alt="{{__('Heavy Breakdowns')}}" title="{{__('Heavy Breakdowns')}}"/>
                            </th>
                            <th scope="col" class="px-4 py-3 text-center tracking-wider">
                            <img src="{{asset('images/averia_low_back.png')}}" class="h-6 w-6 min-h-6 min-w-6" alt="{{__('Light Breakdowns Repaired')}}" title="{{__('Light Breakdowns Repaired')}}"/> 
                            </th>
                            <th scope="col" class="px-4 py-3 text-center tracking-wider">
                            <img src="{{asset('images/averia_grave_back.png')}}" class="h-6 w-6 min-h-6 min-w-6" alt="{{__('Heavy Breakdowns Repaired')}}" title="{{__('Heavy Breakdowns Repaired')}}"/>
                            </th>
                            <th scope="col" class="block px-4 py-3 text-center mx-auto tracking-wider">
                            <img src="{{asset('images/colision.png')}}" class="h-6 w-6 min-h-6 min-w-6" alt="{{__('Collisions')}}" title="{{__('Collisions')}}"/>
                            </th>
                            @if ($campeonato->desgaste)
                                <th scope="col" class="px-4 py-3 text-left tracking-wider">
                                <img src="{{asset('images/motor.png')}}" class="h-6 w-6 min-h-6 min-w-6" alt=" {{__('Engine Points')}}" title=" {{__('Engine Points')}}"/>
                                   
                                </th>
                            @endif
                        </tr>
                    </thead>

                    <tbody class="bg-gray-800">
                        
                        @foreach ($campeonato->resultadoCarrera($carrera)->get() as $resultado)
                        <tr class="{{($loop->odd) ? 'bg-black bg-opacity-20' :'' }}">
                            <td class="flex px-4 py-4 whitespace-nowrap text-center  ">
       

                                <div class="flex items-center text-sm">
                                    <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                                    <img class="object-cover w-full h-full rounded-full" src="{{ asset($resultado->inscrito()->usuario()->first()->avatar)}} " alt="" loading="lazy" />
                                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                                    </div>
                                    <div>
                                    <p class="font-semibold">{{$resultado->inscrito()->usuario()->first()->name}}</p>
                                    <p class="text-xs text-gray-600">{{($resultado->inscrito()->usuario()->first()->bot == 1) ? 'Bot' : CountryFlag::get('ES')}}</p>
                                    </div>
                                </div>
                            </td>
                            <!--td class="px-4 py-4 whitespace-nowrap items-center hidden md:table-cell text-center ">
                            <img class="object-cover h-6 " src=" {{ asset($resultado->inscrito()->coche()->first()->imagen)}} " alt="" loading="lazy" />
                            </td>
                            @if ($campeonato->escuderias)
                            <td class="px-4 py-4 whitespace-nowrap hidden md:table-cell text-center ">
                                <img class="object-cover h-6 " src=" {{ asset($resultado->inscrito()->escuderia()->first()->imagen)}} " alt="" loading="lazy" />
                            </td>
                            @endif
                            -->
                            <td class=" py-4 whitespace-nowrap text-center ">
                                <x-input-label>{{$resultado->qualy}}</x-input-label>
                            </td>
                            <td class=" py-4 whitespace-nowrap text-center ">
                                <x-input-label>{{$resultado->posicion}}</x-input-label>
                            </td>
                            <td class=" py-4 whitespace-nowrap text-center ">
                                <x-input-label>{{$resultado->adelantamientos}}</x-input-label> 
                            </td>
                            <td class=" py-4 whitespace-nowrap text-center ">
                                <x-input-label>{{$resultado->ataques}}</x-input-label>  
                            </td>
                            <td class=" py-4 whitespace-nowrap text-center ">
                                <x-input-label>{{$resultado->defensas}}</x-input-label>  
                            </td>
                            <td class=" py-4 whitespace-nowrap text-center ">
                                <x-input-label>{{$resultado->averias_leves}}</x-input-label>  
                            </td>
                            <td class=" py-4 whitespace-nowrap text-center ">                                
                                <x-input-label>{{$resultado->averias_graves}}</x-input-label>    
                            </td>
                            <td class=" py-4 whitespace-nowrap text-center ">
                                <x-input-label>{{$resultado->reparaciones_leves}}</x-input-label>    
                            </td>
                            <td class=" py-4 whitespace-nowrap text-center ">
                                <x-input-label>{{$resultado->reparaciones_graves}}</x-input-label>   
                            </td>
                            <td class=" py-4 whitespace-nowrap text-center ">
                                <x-input-label>{{$resultado->colisiones}}</x-input-label>    
                            </td>
                           
                            @if ($campeonato->desgaste)
                            <td class=" py-4 whitespace-nowrap text-center ">
                                <x-input-label>{{$resultado->puntos_motor}}</x-input-label>    
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



<x-input-error :messages="$errors->first()" class="mt-2 bg-white p-4" />
@auth
    @if  ( !$carrera->cerrado) 
        <div class="flex my-4">
        @if ( Auth::user()->id == $campeonato->user_id ) 
            
                <div class="flex">
                    <form id="formC{{$carrera->id}}" method="post" action="{{route ('resultados.check', ['carrera'=>$carrera]) }}">
                        @csrf
                        @method('put')

                        <x-confirm nombre="validate-results">
                                <x-slot name="header">
                                    {{ __('Validate Race Results') }}
                                </x-slot>
                                {{ __('Are you sure you want to validate race results? Race results won\'t be changed') }}
                            </x-confirm>
                            <x-primay-link onclick="toggleModal('validate-results')" > 
                                {{__('Validate Race Results') }}
                            </x-primay-link>

                    </form>
                </div>
        @endif
        @if(Auth::user()->isInscrito($campeonato))
            <div class="flex mx-4">
                <x-primay-link href="{{route ('resultado.show', ['carrera'=>$carrera, 'inscrito' =>Auth::user()->inscripcion($campeonato)->first()]) }}">Resultados</x-primay-link>
            </div>
        @endif
        </div>
    @endif
                
@endauth

