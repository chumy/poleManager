<!-- component -->

<header>
        <h2 class="text-lg font-medium text-amber-500">
            {{ __('Search Championship') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Insert the Championship code.') }}
        </p>
    </header>

    <form method="post" action="{{ route('campeonato.search') }}" class="mt-6 space-y-6">
        @csrf
    
        <div class="grid grid-cols-2 gap-4 content-start">
            <div>
                <x-text-input id="hashid" name="hashid" type="text" class="mt-1 block w-full" value="{{ old('hashid') }}"/>
                
            </div>
            <div class=" content-end mb-1">
                <x-primary-button>{{__('Search')}}</x-primary-button>
            </div>
            <x-input-error :messages="$errors->get('searchCampeonato')" class="mt-2" />
        </div>
    </form>

   


   
  