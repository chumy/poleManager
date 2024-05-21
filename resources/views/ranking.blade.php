<x-app-layout>
<!-- Search -->

            

<div class="pt-4 sm:pt-8 pb-2">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 ">
        <div class="sm:p-4 p-2 bg-gray-900 shadow rounded-lg ">
            <div class="max-w-7xl">
                <!-- Standings -->
                <h2 class="sm:text-lg text-md font-medium  text-amber-500">
                    {{ __("Driver's Standings") }}
                </h2>
                
                <div class="flex flex-col">
                    <div class="shadow overflow-hidden sm:rounded-lg bg-gray-800 ">
                        <div class="grid grid-cols-6">
                            <div class="grid place-items-center px-5 py-3 tracking-wider text-xs uppercase font-medium text-gray-400 border-b-2 " >
                                {{__('Driver')}}
                            </div>
                            <div class=" grid place-items-center px-5 py-3 text-center tracking-wider border-b-2 ">
                                <img src="{{asset('images/campeonato.png')}}" class="w-9 min-w-9" alt="{{__('P1')}}" title="{{__('Championships')}}"/> 
                            </div>
                            <div class="grid place-items-center px-5 py-3  tracking-wider border-b-2 ">
                                <img src="{{asset('images/Logros/P1.png')}}" class="w-9 min-w-9" alt="{{__('P1')}}" title="{{__('P1')}}"/> 
                            </div>
                            <div class="grid place-items-center px-5 py-3 text-center tracking-wider border-b-2 ">
                                <img src="{{asset('images/Logros/P2.png')}}" class="w-9 min-w-9" alt="{{__('P2')}}" title="{{__('P2')}}"/> 
                            </div>
                            <div class=" grid place-items-center px-5 py-3 text-center tracking-wider border-b-2 ">
                                <img src="{{asset('images/Logros/P3.png')}}" class="w-9 min-w-9" alt="{{__('P3')}}" title="{{__('P3')}}"/> 
                            </div>
                            <div class=" grid place-items-center px-5 py-3 text-center tracking-wider border-b-2 ">
                                <img src="{{asset('images/pole.png')}}" class="w-9 min-w-9" alt="{{__('Pole Position')}}" title="{{__('Pole Position')}}"/> 
                            </div>
                            
                        
                            @foreach($ranking as $usuario)
                            <div class="flex  flex-col {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }}">
                                <a href="{{ route('user.show',['driver' => $usuario->id]) }}">
                                <div class="flex h-full flex-col sm:flex-row justify-left items-end py-2 pl-2">
                                    <img src="{{ asset($usuario->avatar) }}" alt="{{$usuario->name}}" class="w-10 h-10 mx-2 object-cover rounded-2xl items-center">
                                    <div class="flex-none  mx-2 sm:text-sm text-xs text-center text-gray-400 font-bold  leading-none">{{$usuario->name}}</div>
                                </div>
                                </a>
                            </div>
                            <div class="px-4 py-4 whitespace-nowrap text-gray-200 text-center items-center font-extrabold {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }}">{{$usuario->ganados}}</div>
                            <div class="px-4 py-4 whitespace-nowrap text-gray-200 text-center items-center font-extrabold {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }}">{{$usuario->p1}}</div>
                            <div class="px-4 py-4 whitespace-nowrap text-gray-200 text-center items-center font-extrabold {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }}">{{$usuario->p2}}</div>
                            <div class="px-4 py-4 whitespace-nowrap text-gray-200 text-center items-center font-extrabold {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }}">{{$usuario->p3}}</div>
                            <div class="px-4 py-4 whitespace-nowrap text-gray-200 text-center items-center font-extrabold {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }}">{{$usuario->poles}}</div>
                            
                            @endforeach    
                        </div>     
                        
                    </div>     
                    <div class="mt-3"> 
                        {{ $ranking->links('pagination::tailwind') }}
                        </div>   
            </div>
            <div class="mt-3"> 
            <x-primay-link href='{{route ("welcome") }}' >
                {{ __('Back') }}
            </x-primay-link>
            </div>
        </div>

    </div>
</div>

</x-app-layout>
