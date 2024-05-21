
<section>
    <header>
        <h2 class="text-lg  text-white font-extrabold">
            {{ __('New Championship') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    <form method="post" action="{{ route('campeonato.store') }}" class="mt-6 space-y-6">
        @csrf
    

        <div>
            <x-input-label for="new_campeonato_name" :value="__('Name')" />
            <x-text-input id="new_campeonato_name" name="nombre" type="text" class="mt-1 block w-full" value="{{ old('nombre') }}"/>
            <x-input-error :messages="$errors->newCampeonato->get('nombre')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="descripcion" :value="__('Description')" />
            <x-textarea id="new_campeonato_description" name="descripcion" type="textarea" class="mt-1 block w-full" value="{{ old('descripcion') }}"/>
            <!--textarea id="descripcion" name="descripcion" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-indigo-500 focus:border-indigo-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-indigo-500 dark:focus:border-indigo-500"></textarea-->
            <x-input-error :messages="$errors->newCampeonato->get('descripcion')" class="mt-2" />
        </div>

        <div>
                <x-input-label for="new_campeonato_carreras" :value="__('Number of races')" />
                <x-text-input id="new_campeonato_carreras" name="num_carreras" type="number" class="mt-1 block w-full" placeholder="4" value="{{ old('num_carreras') }}"/>
                <x-input-error :messages="$errors->newCampeonato->get('num_carreras')" class="mt-2" />
            </div>

        <div class="grid grid-cols-2 gap-4 content-start">


            <div>
                <x-input-label for="new_campeonato_coches" :value="__('Total number of cars')" />
                <x-text-input id="new_campeonato_coches" name="num_coches" type="number" class="mt-1 block w-full" placeholder="6" value="{{ old('num_coches') }}"/>
                <x-input-error :messages="$errors->newCampeonato->get('num_coches')" class="mt-2" />
            </div>

            <div>
                <x-input-label for="new_campeonato_bots" :value="__('Number of bots')" />
                <x-text-input id="new_campeonato_bots" name="num_bots" type="number" class="mt-1 block w-full" placeholder="2" value="{{ old('num_bots') }} "/>
                <x-input-error :messages="$errors->newCampeonato->get('num_bots')" class="mt-2" />
            </div>

        </div>


        <div>
                
                <label class="inline-flex items-center cursor-pointer"> 
                <x-checkbox name="escuderias" value="1">{{__('Teams')}}</x-checkbox>
                </label>
                <x-input-error :messages="$errors->newCampeonato->get('escuderias')" class="mt-2" />
        </div>
        
        <div class="flex">
            <div>
                
                <label class="inline-flex items-center cursor-pointer "> 
                <x-checkbox name="cartas_piloto" value="1">{{__('Driver Cards')}}</x-checkbox>
                </label>
                <x-input-error :messages="$errors->newCampeonato->get('cartas_piloto')" class="mt-2" />
            </div>

            <div>
                
                <label class="inline-flex items-center cursor-pointer mx-4"> 
                <x-checkbox name="cartas_escuderia" value="1">{{__('Team Cards')}}</x-checkbox>
                </label>
                <x-input-error :messages="$errors->newCampeonato->get('cartas_escuderia')" class="mt-2" />
            </div>

        </div>
        <div class="flex">
            <div>
                <label class="inline-flex items-center cursor-pointer"> 
                <x-checkbox name="desgaste" value="1">{{__('Engine Wear')}}</x-checkbox>
                </label>
                <x-input-error :messages="$errors->newCampeonato->get('desgaste')" class="mt-2" />
            </div>
            <div>
                
                <label class="inline-flex items-center cursor-pointer mx-4"> 
                <x-checkbox name="reglajes" value="1">{{__('Reglajes')}}</x-checkbox>
                </label>
                <x-input-error :messages="$errors->newCampeonato->get('reglajes')" class="mt-2" />
            </div>
            <div>
                
                <label class="inline-flex items-center cursor-pointer mx-4"> 
                <x-checkbox name="estress" value="1">{{__('Stress')}}</x-checkbox>
                </label>
                <x-input-error :messages="$errors->newCampeonato->get('estress')" class="mt-2" />
            </div>
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Next') }}</x-primary-button>

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
