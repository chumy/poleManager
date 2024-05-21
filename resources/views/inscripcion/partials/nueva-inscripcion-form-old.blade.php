
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Register') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('inscripcion.store') }}" class="mt-6 space-y-6">
        @csrf
        <input type="hidden" value="{{$campeonato->hashid}}" name="hashid">
        
        
        @if(!$campeonato->escuderias)

        <div>
            <x-input-label for="new_inscripcion_car" value="{{ __('Choose a car') }} " />
            
            <x-select id="coche" name="coche">
                    <x-slot name="content">
                    <option value="0">{{__('Select one')}}</option>

                    
                    @foreach ( $coches as $coche)
                        <option value="{{$coche->id}}" {{ (old("coche") == $coche->id ? "selected":"") }}>
                            {{$coche->nombre}}
                        </option>
                        
                    @endforeach
            </x-slot>
            </x-select>
            <x-input-error :messages="$errors->newInscripcion->get('coche')" class="mt-2" />
        </div>

        @else

        <div>
            <x-input-label for="new_inscripcion_escuderia" value="{{ __('Choose a team') }} " />
            
            <x-select id="escuderia" name="escuderia">
                    <x-slot name="content">
                    <option value="0">{{__('Select one')}}</option>

                    
                    @foreach ( $campeonato->escuderiasLibres() as $escuderia)
                        <option value="{{$escuderia->id}}" {{ (old("escuderia") == $escuderia->id ? "selected":"") }}>{{$escuderia->nombre}}</option>
                        
                    @endforeach
            </x-slot>
            </x-select>
            <x-input-error :messages="$errors->newInscripcion->get('escuderia')" class="mt-2" />
        </div>
        @endif

        

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

        </div>

</form>
</section>
