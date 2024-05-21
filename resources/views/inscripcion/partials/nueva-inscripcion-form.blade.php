
<section>
    <header>
        <h2 class="text-lg font-medium my-2 text-amber-500">
            {{ __('Register') }}
        </h2>
        

        <p class="mt-1 text-sm text-gray-300">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('inscripcion.store') }}" class="mt-6 space-y-6">
        @csrf
        <input type="hidden" value="{{$campeonato->hashid}}" name="hashid">
        <input type="hidden" id="coche" name="coche" >
        <input type="hidden" id="piloto" name="piloto">
        <input type="hidden" id="escuderia" name="escuderia">
        
        



            <div>
                <h2 class="text-sm font-medium my-2 text-amber-500">
                    @if($campeonato->escuderias)
                        {{ __('Choose a Team') }} 
                    @else
                        {{ __('Choose a Car') }} 
                    @endif 
                </h2>
                
                    <!-- Profiles -->
                    <div class="flex flex-row flex-wrap gap-5 mt3 justify-center rounded-lg bg-gray-800 p-4" id="car-contents">
                        @if($campeonato->escuderias)
                            @foreach ( $campeonato->escuderiasLibres() as $escuderia)
                                <div class="text-gray-500 flex rounded hover:outline outline-offset-2 outline-4 outline-amber-500" id="car{{ $escuderia->id}}">
                                    <a href="javascript:setCar({{ $escuderia->id}} )" class="flex flex-col items-center group gap-2">
                                        <img class="w-20 " src="{{ asset($escuderia->imagen) }}"  />
                                        <p class=" group-hover:text-gray-100"> {{$escuderia->nombre}} </p>
                                    </a>
                                </div>
                            @endforeach
                        @else
                            @foreach ( $coches as $coche)
                                <div class="flex rounded hover:outline outline-offset-2 outline-4 outline-amber-500" id="car{{ $coche->id}}">
                                    <a href="javascript:setCar({{ $coche->id}} )" class="flex flex-col items-center group gap-2">
                                        <img class="h-20 " src="{{ asset($coche->imagen) }}"  />
                                    </a>
                                </div>
                            @endforeach
                        @endif

                </div>
                <x-input-error :messages="$errors->newInscripcion->get('coche')" class="mt-2" />
          
            </div>
     
            @if($campeonato->cartas_piloto)
                <div>
                    <h2 class="text-sm font-medium my-2 text-amber-500">
                            {{ __('Choose a Driver card') }} 
                    </h2>
                    
                        <!-- Profiles -->
                        <div class="flex flex-row flex-wrap justify-center gap-5 mt3 rounded-lg bg-gray-800 p-4" id="driver-contents">
                            
                                @foreach ( $pilotos as $driver)
                                    <div class="text-gray-500 flex rounded hover:outline outline-offset-2 outline-4 outline-amber-500" id="driver{{ $driver->id}}">
                                        <a href="javascript:setDriver({{ $driver->id}} )" class="flex flex-col items-center group gap-2">
                                            <img class="w-20 " src="{{ asset($driver->imagen) }}"  />
                                            <p class="group-hover:text-gray-100"> {{$driver->nombre}} </p>
                                        </a>
                                    </div>
                                @endforeach
                            

                    </div>
                    <x-input-error :messages="$errors->newInscripcion->get('piloto')" class="mt-2" />
                </div>
            @endif 

            @if($campeonato->cartas_escuderia)
                <div>
                    <h2 class="text-sm font-medium my-2 text-amber-500">
                            {{ __('Choose a Team card') }} 
                    </h2>
                    
                        <!-- Profiles -->
                        <div class="flex flex-row flex-wrap justify-center gap-5 mt3 rounded-lg bg-gray-800 p-4" id="team-contents">
                            
                                @foreach ( $escuderias as $team)
                                    <div class="text-gray-500 flex rounded hover:outline outline-offset-2 outline-4 outline-amber-500" id="team{{ $team->id}}">
                                        <a href="javascript:setTeam({{ $team->id}} )" class="flex flex-col items-center group gap-2">
                                            <!--img class="w-20 " src="{{ asset($team->imagen) }}"  /-->
                                            <p class="group-hover:text-gray-100 text-2xl"> {{$team->nombre}} </p>
                                        </a>
                                    </div>
                                @endforeach
                            

                    </div>
                    <x-input-error :messages="$errors->newInscripcion->get('escuderia')" class="mt-2" />
                </div>
            @endif 
        

        <div class="flex justify-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
            <x-primay-link href="{{route ('campeonato.show', ['campeonato'=>$campeonato->hashid]) }}">{{__('Back') }} </x-primay-link >                     
        </div>

        
      
        <!-- Component End  -->
    </div>
</form>

<script>
    function setCar(valor){
        document.getElementById('coche').value = valor;
        let tabContents = document.querySelector("#car-contents");
        for (let i = 0; i < tabContents.children.length; i++) {

            tabContents.children[i].classList.remove("outline");
            tabContents.children[i].classList.remove("text-gray-100");
            tabContents.children[i].classList.add("text-gray-500");

            if (tabContents.children[i].id === 'car'+valor) {
                tabContents.children[i].classList.add("outline");
                tabContents.children[i].classList.remove("text-gray-500");
                tabContents.children[i].classList.add("text-gray-100");

            }
            

        }
    }

    function setDriver(valor){
        document.getElementById('piloto').value = valor;
        let tabContents = document.querySelector("#driver-contents");
        for (let i = 0; i < tabContents.children.length; i++) {

            tabContents.children[i].classList.remove("outline");
            tabContents.children[i].classList.remove("text-gray-100");
            tabContents.children[i].classList.add("text-gray-500");

            if (tabContents.children[i].id === 'driver'+valor) {
                tabContents.children[i].classList.add("outline");
                tabContents.children[i].classList.remove("text-gray-500");
                tabContents.children[i].classList.add("text-gray-100");

            }
            

        }
    }

    function setTeam(valor){
        document.getElementById('escuderia').value = valor;
        let tabContents = document.querySelector("#team-contents");
        for (let i = 0; i < tabContents.children.length; i++) {

            tabContents.children[i].classList.remove("outline");
            tabContents.children[i].classList.remove("text-gray-100");
            tabContents.children[i].classList.add("text-gray-500");

            if (tabContents.children[i].id === 'team'+valor) {
                tabContents.children[i].classList.add("outline");
                tabContents.children[i].classList.remove("text-gray-500");
                tabContents.children[i].classList.add("text-gray-100");

            }
            

        }
    }


  
</script>

</section>
