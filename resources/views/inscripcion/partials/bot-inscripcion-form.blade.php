
<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Assign Bot') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Choose one bot') }}
        </p>
    </header>

    <form method="post" action="{{ route('inscripcion.bot.store') }}" class="mt-6 space-y-6">
        @csrf
        <input type="hidden" value="{{$campeonato->hashid}}" name="campeonato">
        
        <div class="grid gap-4 grid-cols-2 grid-rows-1 text-slate-700">
            <div class="gap-4">
                <x-input-label for="new_inscripcion_bot" value="{{ __('Choose a bot') }} " />

                <x-select id="bot" name="bot">
                    <x-slot name="content">
                        <option value="0">{{__('Select one')}}</option>

                        
                        @foreach ( $campeonato->botsLibres() as $bot)
                            <option value="{{$bot->id}}" {{ (old("bot") == $bot->id ? "selected":"") }}>{{$bot->nombre}}</option>
                            
                        @endforeach
                    </x-slot>
                </x-select>
                <x-input-error :messages="$errors->newInscripcion->get('bot')" class="mt-2" />
            </div>


              
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>
        </div>

    </form>
</section>
