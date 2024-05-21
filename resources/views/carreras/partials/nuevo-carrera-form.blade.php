
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Add Races') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('carreras.store') }}" class="mt-6 space-y-6">
        @csrf
        <input type="hidden" value="{{$campeonato->hashid}}" name="campeonato">
        @for ($i = 1; $i <= $campeonato->num_carreras; $i++)
        
        
        <div>
            <x-input-label for="new_campeonato_c{{$i}}" value="{{ __('Circuit') }} {{$i}}" />
            
            <x-select id="c{{$i}}" name="c{{$i}}">
                    <x-slot name="content">
                    <option value="0">{{__('Select one')}}</option>

                    
                    @foreach ( $circuitos as $circuito)
                        <option value="{{$circuito->id}}" {{ (old("c$i") == $circuito->id ? "selected":"") }}>{{$circuito->nombre}}</option>
                        
                    @endforeach
            </x-slot>
            </x-select>
            <x-input-error :messages="$errors->newCampeonato->get('c'.$i)" class="mt-2" />
        </div>

        @endfor 

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
