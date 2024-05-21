<section>

<div class="flex flex-row text-white">
    <div class="flex flex-col sm:flex-row w-full">
        <div class="flex flex-col w-full">
         
            <p class="text-xl text-white font-extrabold">{{$campeonato->nombre }}</p>
            <h2 class="text-2xl my-2 text-gray-500 font-extrabold">{{$campeonato->hashid}}</h2>
            @if ($campeonato->activo == 2) 
                <span class="w-20 text-center rounded-md bg-green-50 py-1 text-xs font-medium text-indigo-800 ring-1 ring-inset ring-indigo-600/20 ">{{__('Complete')}}</span>
            @elseif ($campeonato->activo == 1) 
                <span class="w-20 text-center rounded-md bg-green-50 py-1 text-xs font-medium text-green-800 ring-1 ring-inset ring-green-600/20 ">{{__('Active')}}</span>                
            @else
                <span class="w-20 text-center rounded-md bg-red-50  py-1 text-xs font-medium text-red-800 ring-1 ring-inset ring-red-600/20">{{__('Inactive')}}</span>
            @endif
            <p class="text-lg my-2 text-white">{{$campeonato->descripcion }}</p>
            
        </div>
        <div class="flex flex-col w-full h-full">
            <div class="flex flex-row justify-end">
                <div class="flex flex-col m-2 py-2 px-2 bg-gray-600 rounded outline outline-offset-2 outline-amber-500 justify-center">
                    <div class="items-center text-center text-amber-500 font-extrabold">{{__('Races')}}</div>
                    <div class="">
                        <img src="{{ asset('images/wins.png')}}" class="w-20"/>
                    </div>
                    <div class="text-center font-bold align-bottom">{{$campeonato->num_carreras}}</div>
                </div>

                <div class="flex flex-col m-2 py-2 px-2 bg-gray-600 rounded outline outline-offset-2 outline-amber-500  justify-center ">
                    <div class="items-center mb-2 place-content-start text-center text-amber-500 font-extrabold">{{__('Cars')}}</div>
                    <div class="h-full content-center">
                        <img src="{{ asset('images/coches/coche_neutro.png')}}" class="w-20"/>
                    </div>
                    <div class="text-center font-bold align-bottom">{{$campeonato->num_coches }}</div>
                </div>

                <div class="flex flex-col m-2 py-2 px-2 bg-gray-600 rounded outline outline-offset-2 outline-amber-500 ">
                    <div class="items-center text-center text-amber-500 font-extrabold">{{__('Bots')}}</div>
                    <div class="h-full content-center">
                        <img src="{{ asset('images/robot.png')}}" class="w-20"/>
                    </div>
                    <div class="text-center font-bold align-bottom">{{$campeonato->num_bots }}</div>
                </div>
            </div>
        </div>
        
    </div>
</div>    
    <div class="flex flex-wrap pt-1 sm:pt-0">
        <div class="flex flex-col m-1 p-1 sm:m-2 sm:p-2 {{(($campeonato->escuderias) ? 'outline outline-offset-1 outline-amber-500 rounded' : 'grayscale')}}  ">
            <img src="{{ asset('images/escuderias.png')}} " alt="{{__('Teams')}}" title="{{__('Teams')}}" class="h-8 sm:h-12" onclick="confirmar('escuderias')"/>
        </div>
        
        <div class="flex flex-col m-1 p-1 sm:m-2 sm:p-2 {{(($campeonato->estress) ? 'outline outline-offset-1 outline-amber-500 rounded' : 'grayscale')}}">
            <img src="{{ asset('images/estress.png')}}" alt="{{__('Stress')}}" title="{{__('Stress')}}" class="h-8 sm:h-12" onclick="confirmar('estress')"/>
        </div>

        <div class="flex flex-col m-1 p-1 sm:m-2 sm:p-2 {{(($campeonato->cartas_piloto) ? 'outline outline-offset-1 outline-amber-500 rounded' : 'grayscale')}}">
            <img src="{{ asset('images/cartas_piloto.png')}}" alt="{{__('Drivers Cards')}}" title="{{__('Drivers Cards')}}" class="h-8 sm:h-12" onclick="confirmar('cartas_piloto')"/>
        </div>

        <div class="flex flex-col m-1 p-1 sm:m-2 sm:p-2 {{(($campeonato->cartas_escuderia) ? 'outline outline-offset-1 outline-amber-500 rounded' : 'grayscale')}}">
            <img src="{{ asset('images/cartas_escuderias.png')}}" alt="{{__('Teams Cards')}}" title="{{__('Teams Cards')}}" class="h-8 sm:h-12" onclick="confirmar('cartas_escuderia')"/>
        </div>

        <div class="flex flex-col m-1 p-1 sm:m-2 sm:p-2 {{(($campeonato->reglajes) ? 'outline outline-offset-1 outline-amber-500 rounded' : 'grayscale')}}">
            <img src="{{ asset('images/averia_low_front.png')}}" alt="{{__('Reglages')}}" title="{{__('Reglages')}}"  class="h-8 sm:h-12" onclick="confirmar('reglajes')"/>
        </div>
        
        <div class="flex flex-col m-1 p-1 sm:m-2 sm:p-2 {{(($campeonato->desgaste) ? 'outline outline-offset-1 outline-amber-500 rounded' : 'grayscale')}}">
                <img src="{{ asset('images/motor.png')}}" alt="{{__('Engine Wearing')}}"  title="{{__('Engine Wearing')}}" class="h-8 sm:h-12" onclick="confirmar('desgaste')"/>
        </div>
    </div>


</section>

@if ($campeonato->activo == 0)
<form method="post" action="{{ route('campeonato.update', ['campeonato' => $campeonato]) }}" class="mt-6 space-y-6">
    @csrf
    @method('put')
    <input type="hidden" id="atributo" name="atributo">
    <x-confirm nombre="confirm-championship">
        <x-slot name="header">
            {{ __('Championship Update') }}
        </x-slot>
        {{ __('Are you sure you want to de/activate championship features?') }}

        <div class="flex p-4 justify-center ouline outline-4 outline-red-700 text-red-700 font-extrabold" >{{ __('All previous registrations will be deleted') }}</div>
    </x-confirm>

</form>
<script>
function confirmar(atributo){
    document.getElementById('atributo').value=atributo;
    toggleModal('confirm-championship');
}
function toggleModal(modalID){
    
    document.getElementById(modalID).classList.toggle("hidden");
    document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
    document.getElementById(modalID).classList.toggle("flex");
    document.getElementById(modalID + "-backdrop").classList.toggle("flex");
  }
</script>
@else
<script>
function confirmar(atributo)
{ 
    return true;
}
</script>
@endif