<x-app-layout>
<div class="pt-4 sm:pt-8 pb-2">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 ">
        <div class="sm:p-4 p-2 bg-gray-900 shadow rounded-lg ">
            <div class="max-w-7xl">
        @include('campeonato.partials.show-cabecera-campeonato')
        </div>
            </div>
        </div>
    </div>

    <div class="pt-2 sm:pt-8 pb-2">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 ">
        <div class="sm:p-4 p-2 bg-gray-900 shadow rounded-lg ">
            <div class="max-w-7xl">

               
             
                @if ($campeonato->escuderias)
                @include('campeonato.partials.show-clasificacion-escuderias')
                @endif
                @include('campeonato.partials.show-clasificacion-campeonato')
                
                @if ($campeonato->activo)
                    @include('campeonato.partials.show-carreras-campeonato')    
                @endif

                @auth 
                    @include('campeonato.partials.show-botonera')
                @endauth 

               
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
