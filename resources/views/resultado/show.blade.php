<x-app-layout>


    <div class="py-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
            <div class="sm:p-8 bg-gray-900 shadow sm:rounded-lg">
                <div class="max-w-7xl">
           

              <!-- Formulario tabla -->
              <!--include ('resultado.partials.nuevo-resultado-form') -->
              @if ( ( Auth::user()->id == $carrera->campeonato()->user_id ) && ( !$carrera->cerrado) )
              <!-- Inscrito Admin -->
                @include ('resultado.partials.nuevo-resultado-stepper')
              @else
              <!-- Inscrito individual -->
                @include ('resultado.partials.resultado-stepper-inscrito') 
              @endif
              
             
       

               
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
