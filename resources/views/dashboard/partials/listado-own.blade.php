<!-- component -->

<h2 class="text-lg font-medium text-amber-500">
    {{ __('Your Championships') }}
    </h2>
    
    @if ($user->listadoCampeonatos()->count() > 0)  
    
    <div class="flex flex-col">
        <div class="shadow overflow-hidden sm:rounded-lg bg-gray-800 ">
            <div class="grid grid-cols-1 sm:grid-cols-5 bg-gray-800 text-xs uppercase font-medium text-gray-400">
                <div class="grid place-items-center px-5 py-3  tracking-wider border-b-2">
                {{__('Name')}}
                </div>
                <div class="hidden sm:grid place-items-center px-5 py-3 text-center tracking-wider border-b-2">
                {{__('Creator')}} 
                </div>
   
                <div class="hidden sm:grid place-items-center px-5 py-3 text-center tracking-wider border-b-2">
                {{__('Participants')}}
                </div>
                <div class="hidden sm:grid place-items-center px-5 py-3 text-center tracking-wider border-b-2">
                {{__('Status')}}
                </div>
                <div class="hidden sm:grid place-items-center px-5 py-3 text-center tracking-wider border-b-2">
                {{__('Actions')}}
                </div>
            
                @foreach ($user->listadoCampeonatos()->paginate(5,['*'],'own') as $campeonato)
                <div class="grid place-items-center px-5 py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }} pl-4 text-center">
                    <a href="{{route ('campeonato.show', ['campeonato' => $campeonato->hashid]) }}">
                        {{$campeonato['nombre']}}
                    </a>
                </div>
                <div class="hidden sm:grid place-items-center px-5 py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }} pl-4 text-center">
                    <img class="object-cover w-6 h-6 rounded-full" src="{{ asset($campeonato->getCreator()->avatar)}} " alt="" loading="lazy" />
                </div>
         
                
                <div class="hidden sm:grid place-items-center px-5 py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }} pl-4 text-center">
                    <div class="flex items-center justify-center">
                        @foreach($campeonato->inscritos()->get() as $inscrito)
                        <img class="w-6 h-6 rounded-full border-gray-200 border {{($campeonato->inscritos()->count() == 1 ) ? '' : '-m-1'}} transform hover:scale-125" src="{{ asset($inscrito->usuario()->first()->avatar)}} "/>
                        @endforeach
                    </div>
                </div>
                <div class="hidden sm:grid place-items-center px-5 py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }} pl-4 text-center">
                    @if($campeonato->activo == '1')
                        <span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs">{{__('Active')}}</span>
                    @elseif($campeonato->activo == '0')
                        <span class="bg-orange-200 text-orange-600 py-1 px-3 rounded-full text-xs">{{__('Inactive')}}</span>
                    @elseif($campeonato->activo == '2')
                        <span class="bg-indigo-200 text-indigo-600 py-1 px-3 rounded-full text-xs">{{__('Completed')}}</span>                    
                    @endif
                </div>
                <div class="hidden sm:grid place-items-center px-5 py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }} pl-4 text-center">
                    <div class="w-4 mr-2 transform hover:text-orange-500 hover:scale-110">
                        <a href="{{route ('campeonato.show', ['campeonato' => $campeonato->hashid]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </a>
                    </div>
                </div>
    
                @endforeach
                
            </div>        
               
        </div>     
    </div>    
    <div class="mt-1"> 
    {{ $user->listadoCampeonatos()->paginate(5,['*'],'own')->links('pagination::tailwind') }}
    </div>
    
    @else
    
    @endif
    
       
      