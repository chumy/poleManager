
<div class="flex align-middle">
    <div class="flex flex-col basis-1/2 ">
        <div class="flex sm:mb-0 mb-3 justify-center items-center">
            <img src="{{ asset($user->avatar)}}" alt="{{$user->name}}" class=" sm:w-24 sm:h-24 w-10 h-10 object-cover rounded-2xl items-center">
        </div>
        <div class="flex flex-row items-center">    
            <div class="w-full flex-none sm:text-lg text-sm text-center text-gray-400 font-bold leading-none">{{$user->name}}</div>
        </div>
    </div>
    

    


    <div class="flex-auto pt-2 align-middle">
        <div class="flex items-center justify-center ">
            
            <img class="object-cover h-12 sm:h-24 " src=" {{ asset($user->getCocheHabitual())}}" alt="" loading="lazy" />
        </div>
    </div>
    
</div>

<h2 class="text-lg font-medium my-2 text-amber-500">
            {{ __("Driver's Standings") }}
        </h2>

<div class="flex flex-col">
    <div class="shadow overflow-hidden sm:rounded-lg bg-gray-800 ">
        <div class="grid grid-cols-5">
            <div class=" grid place-items-center px-5 py-3 text-center tracking-wider">
                <img src="{{asset('images/campeonato.png')}}" class="w-9 min-w-9" alt="{{__('P1')}}" title="{{__('Championships')}}"/> 
            </div>
            <div class="grid place-items-center px-5 py-3  tracking-wider">
                <img src="{{asset('images/Logros/P1.png')}}" class="w-9 min-w-9" alt="{{__('P1')}}" title="{{__('P1')}}"/> 
            </div>
            <div class="grid place-items-center px-5 py-3 text-center tracking-wider">
                <img src="{{asset('images/Logros/P2.png')}}" class="w-9 min-w-9" alt="{{__('P2')}}" title="{{__('P2')}}"/> 
            </div>
            <div class=" grid place-items-center px-5 py-3 text-center tracking-wider">
                <img src="{{asset('images/Logros/P3.png')}}" class="w-9 min-w-9" alt="{{__('P3')}}" title="{{__('P3')}}"/> 
            </div>
            <div class=" grid place-items-center px-5 py-3 text-center tracking-wider">
                <img src="{{asset('images/pole.png')}}" class="w-9 min-w-9" alt="{{__('Pole Position')}}" title="{{__('Pole Position')}}"/> 
            </div>
            
            <div class="px-4 py-4 whitespace-nowrap text-gray-200 text-center items-center font-extrabold">{{$user->getCampeonatosGanados()}}</div>
            <div class="px-4 py-4 whitespace-nowrap text-gray-200 text-center items-center font-extrabold">{{$user->getCountResults('posicion','1')}}</div>
            <div class="px-4 py-4 whitespace-nowrap text-gray-200 text-center font-extrabold">{{$user->getCountResults('posicion','2')}}</div>
            <div class="px-4 py-4 whitespace-nowrap text-gray-200 text-center items-center font-extrabold">{{$user->getCountResults('posicion','3')}}</div>
            <div class="px-4 py-4 whitespace-nowrap text-gray-200 text-center items-center font-extrabold">{{$user->getCountResults('qualy','1')}}</div>
            
        
        </div>        
    </div>     
</div>     







               


