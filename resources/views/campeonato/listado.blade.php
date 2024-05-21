<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    
                    @if (count($campeonatos) > 0)

                        @foreach ($campeonatos as $campeonato)
                        <a class="list-f1" href="{{route ('campeonato.show', ['campeonato' => $campeonato->hashid]) }}">
                        {{$campeonato->nombre}}</a>

                        @endforeach

                    @else
                    {{ __("You're logged in!") }}

                    @include('campeonato.partials.listado-inscritos')
                    @endif



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
