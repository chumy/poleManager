        
<div class="flex flex-row">
    <div class="flex flex-col align-middle">
        <div class="flex flex-row justify-center items-center sm:text-8xl text-3xl">
            {{CountryFlag::get($carrera->circuito()->country)}}
        </div>
        <div class="flex flex-row justify-center items-center">
            <h2 class="sm:text-lg text-sm  text-white font-extrabold p-1">
                {{$carrera->circuito()->nombre}} ({{$carrera->orden}}/{{$carrera->campeonato()->num_carreras}}) 
            </h2>
        </div>
    </div>

</div>    

<form method="post" id="resultadoForm" action="{{ route('resultado.store', ['carrera'=>$carrera, 'inscrito' =>$inscrito]) }}" class="mt-6 " onsubmit="return checkQualy(event)"> 
@csrf
        

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
                
                    <div class="sm:flex hidden px-4">
                            <div class="flex sm:mb-0 mb-3 justify-center items-center">
                                <img class="object-cover h-16 " src=" {{ asset('/images/pilotos/Driver-4.png')}} " alt="" loading="lazy" />
                            </div>
                    </div>
                


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
                    <x-counter-horizontal max='{{$carrera->campeonato()->inscritos()->count()}}' campo='qualy' valor="{{$resultado->qualy}}"></x-counter-horizontal>
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
                    <x-counter-horizontal max='{{$carrera->campeonato()->inscritos()->count()}}' campo='posicion' valor="{{$resultado->posicion}}"></x-counter-horizontal>
                </div>
            </div>
        </div>
        
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
                    <x-counter-horizontal max='50' campo='adelantamientos' valor="{{$resultado->adelantamientos}}"></x-counter-horizontal>
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
                    <x-counter-horizontal max='30' campo='ataques' valor="{{$resultado->ataques}}"></x-counter-horizontal>
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
                    <x-counter-horizontal max='30' campo='defensas' valor="{{$resultado->defensas}}"></x-counter-horizontal>
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
                    <x-counter-horizontal max='30' campo='colisiones' valor="{{$resultado->colisiones}}"></x-counter-horizontal>
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
                    <x-counter-horizontal max='2' campo='averias_leves' valor="{{$resultado->averias_leves}}"></x-counter-horizontal>
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
                    <x-counter-horizontal max='2' campo='averias_graves' valor="{{$resultado->averias_graves}}"></x-counter-horizontal>
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
                    <x-counter-horizontal max='3' campo='reparaciones_leves' valor="{{$resultado->reparaciones_leves}}"></x-counter-horizontal>
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
                    <x-counter-horizontal max='2' campo='reparaciones_graves' valor="{{$resultado->reparaciones_graves}}"></x-counter-horizontal>
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
                    <x-counter-horizontal max='15' campo='puntos_motor' valor="{{$resultado->puntos_motor}}"></x-counter-horizontal>
                </div>
            </div>
        </div>
        @endif
        
<x-input-error :messages="$errors->newResultado->get('qualy')" class="mt-2 bg-white p-4" />
<x-input-error :messages="$errors->newResultado->get('posicion')" class="mt-2 bg-white p-4" />


        <div class="flex items-center justify-center gap-4 my-2">
        <div class="flex">
                <x-primary-button>{{ __('Save') }}</x-primary-button>
            </div>
            <div class="flex px-4">
            <x-primay-link href='{{route ("campeonato.show", ["campeonato" => $carrera->campeonato()->hashid]) }}' >
            {{ __('Back') }}
            </x-primay-link>

            </div>
        </div>
    </div>
    <x-alert-modal nombre="alert-missing-qualy">
        <x-slot name="header">
            {{ __('Missing values on Qualification') }}
        </x-slot>
        {{ __('Review all values set on Qualifications fields.') }}
</x-alert-modal>

<script>

    function checkQualy(){
        
        if (document.getElementById('qualy').value == '0'){
            toggleModal('alert-missing-qualy')
            return false;
        }
          
        return true;
    }

    function toggleModal(modalID){
        document.getElementById(modalID).classList.toggle("hidden");
        document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
        document.getElementById(modalID).classList.toggle("flex");
        document.getElementById(modalID + "-backdrop").classList.toggle("flex");
    }

    
</script>    