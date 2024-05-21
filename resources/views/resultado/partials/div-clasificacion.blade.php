
<div class="overflow-x-scroll grid grid-cols-14 grid-flow-row auto-rows-max shadow  sm:rounded-lg">
        <div class="sticky top-0 z-10 bg-gray-800 uppercase font-medium  text-xs text-gray-400 py-2 px-5 text-center tracking-wider">{{__('Driver')}}</div>
        <div class="sticky top-0 z-10 bg-gray-800 uppercase font-medium text-xs text-gray-400 py-2 px-5 text-center tracking-wider">{{__('Car')}}</div>
        <div class="sticky top-0 z-10 bg-gray-800 uppercase font-medium  text-xs text-gray-400 py-2 px-5 text-center tracking-wider">{{__('Teams')}}</div>
        <div class="sticky top-0 z-10 bg-gray-800 uppercase font-medium  text-xs text-gray-400 py-2 px-5 text-center tracking-wider">{{__('Qualification')}}</div>
        <div class="sticky top-0 z-10 bg-gray-800 uppercase font-medium  text-xs text-gray-400 py-2 px-5 text-center tracking-wider">{{__('Position')}}</div>
        <div class="sticky top-0 z-10 bg-gray-800 uppercase font-medium  text-xs text-gray-400 py-2 px-5 text-center tracking-wider">{{__('Overtakes')}}</div>
        <div class="sticky top-0 z-10 bg-gray-800 uppercase font-medium  text-xs text-gray-400 py-2 px-5 text-center tracking-wider">
            <img src="{{asset('images/overtake_attack.png')}}" class="h-6 w-9 min-w-9" alt="{{__('Atacks Won')}}"/> 
        </div>
        <div class="sticky top-0 z-10 bg-gray-800 uppercase font-medium min-w-full text-xs text-gray-400 py-2 px-5 text-center tracking-wider">
            <img src="{{asset('images/overtake_defend.png')}}" class="h-6 w-9 min-w-9" alt="{{__('Defends Won')}}"/> 
        </div>
        <div class="sticky top-0 z-10 bg-gray-800 uppercase font-medium min-w-full text-xs text-gray-400 py-2 px-5 text-center tracking-wider">
            <img src="{{asset('images/averia_low_front.png')}}" class="h-6 w-6 min-h-6 min-w-6" alt="{{__('Light Breakdowns')}}"/> 
        </div>
        <div class="sticky top-0 z-10 bg-gray-800 uppercase font-medium min-w-full text-xs text-gray-400 py-2 px-5 text-center tracking-wider">
            <img src="{{asset('images/averia_grave_front.png')}}" class="h-6 w-6 min-h-6 min-w-6" alt="{{__('Heavy Breakdowns')}}"/>
        </div>
        <div class="sticky top-0 z-10 bg-gray-800 uppercase font-medium min-w-full text-xs text-gray-400 py-2 px-5 text-center tracking-wider">
            <img src="{{asset('images/averia_low_back.png')}}" class="h-6 w-6 min-h-6 min-w-6" alt="{{__('Light Breakdowns Repaired')}}"/> 
        </div>
        <div class="sticky top-0 z-10 bg-gray-800 uppercase font-medium min-w-full text-xs text-gray-400 py-2 px-5 text-center tracking-wider">
            <img src="{{asset('images/averia_grave_back.png')}}" class="h-6 w-6 min-h-6 min-w-6" alt="{{__('Heavy Breakdowns Repaired')}}"/>
        </div>
        <div class="sticky top-0 z-10 bg-gray-800 uppercase font-medium min-w-full text-xs text-gray-400 py-2 px-5 text-center tracking-wider">
            <img src="{{asset('images/colision.png')}}" class="h-6 w-6 min-h-6 min-w-6" alt="{{__('Collisions')}}"/>
        </div>
        <div class="sticky top-0 z-10 bg-gray-800 uppercase font-medium min-w-full text-xs text-gray-400 py-2 px-5 text-center tracking-wider">
            <img src="{{asset('images/motor.png')}}" class="h-6 w-6 min-h-6 min-w-6" alt=" {{__('Engine Points')}}"/>
        </div>
        <div class="sticky top-0 z-10 bg-gray-800 uppercase font-medium min-w-full text-xs text-gray-400 py-2 px-5 text-center tracking-wider"></div>
        
        @foreach ($campeonato->inscritos()->get() as $inscrito)
                         
        <div class="{{($loop->odd) ? 'bg-black bg-opacity-20' :'' }}">
            <div class="flex px-4 py-4 whitespace-nowrap ">
                <div class="flex items-center text-sm">
                    <div class="relative w-8 h-8 mr-3 rounded-full md:block">
                        <img class="object-cover w-full h-full rounded-full" src="{{ asset($inscrito->usuario()->first()->avatar)}} " alt="" loading="lazy" />
                    <div class="absolute inset-0 rounded-full shadow-inner" aria-hidden="true"></div>
                    </div>
                    <div>
                        <p class="font-semibold">{{$inscrito->usuario()->first()->name}}</p>
                        <p class="text-xs text-gray-600">Developer</p>
                    </div>
                </div>
            </div>
            <div class="px-4 py-4 whitespace-nowrap items-center hidden md:table-cell">
                <img class="object-cover h-6 " src=" {{ asset($inscrito->coche()->first()->imagen)}} " alt="" loading="lazy" />
            </div>
            @if ($campeonato->escuderias)
            <div class="px-4 py-4 whitespace-nowrap hidden md:table-cell">
                <img class="object-cover h-6 " src=" {{ asset($inscrito->escuderia()->first()->imagen)}} " alt="" loading="lazy" />
            </div>
            @endif
                             <div class="px-4 py-4 whitespace-nowrap hidden md:table-cell">
                                 <x-counter-input name="qualy_{{$inscrito->id}}" max="{{$campeonato->num_coches}}"/>  
                            </div>
                             <div class="px-4 py-4 whitespace-nowrap hidden md:table-cell">
                                 <x-counter-input name="position_{{$inscrito->id}}" max="{{$campeonato->num_coches}}"/>  
                             </div>
                             <div class="px-4 py-4 whitespace-nowrap">
                                 <x-counter-input name="overtake_{{$inscrito->id}}" max="75"/>  
                             </div>
                             <div class="px-1 py-4 whitespace-nowrap">
                                 <x-counter-input name="attack_{{$inscrito->id}}" max="75"/>  
                             </div>
                             <div class="px-1 py-4 whitespace-nowrap">
                                 <x-counter-input name="defend_{{$inscrito->id}}" max="75"/>  
                             </div>
                             <div class="px-1 py-4 whitespace-nowrap">
                                 <x-counter-input name="lb_{{$inscrito->id}}" max="4"/>  
                             </div>
                             <div class="px-1 py-4 whitespace-nowrap">
                                 <x-counter-input name="hb_{{$inscrito->id}}" max="2"/>  
                             </div>
                             <div class="px-1 py-4 whitespace-nowrap">
                                 <x-counter-input name="lbr_{{$inscrito->id}}" max="4"/>  
                             </div>
                             <div class="px-1 py-4 whitespace-nowrap">
                                 <x-counter-input name="hbr_{{$inscrito->id}}" max="2"/>  
                             </div>
                             <div class="px-1 py-4 whitespace-nowrap">
                                 <x-counter-input name="col_{{$inscrito->id}}" max="75"/>  
                             </div>
                            
                             @if ($campeonato->desgaste)
                             <div class="px-1 py-4 whitespace-nowrap">
                                 <x-counter-input name="motor_{{$inscrito->id}}" max="15"/>  
                             </div> 
                             @endif                        
                         </div>
 
                         @endforeach

    
   
  </div>