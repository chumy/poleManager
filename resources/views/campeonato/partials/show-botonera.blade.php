<section>

                  
    <div class="flex flex-wrap justify-center py-0 pt-4 sm:py-4 px-4 ">
  <!-- botonera -->
        @if (Auth::user()->email_verified_at)
            @if ( ! $campeonato->activo ) 
                @if (Auth::user()->isInscrito($campeonato) == 1) 
                    <div class="px-4 pb-2">
                        <x-primay-link
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-inscripcion-deletion')">
                            {{__('Unregister') }} 
                        </x-primay-link>    
                    
                        @include('campeonato.partials.modales.unsubscribe-campeonato')
                    </div>
                @endif

                @if ( ($campeonato->num_coches  > $campeonato->inscritos()->count()) && (Auth::user()->isInscrito($campeonato) == 0) ) 
                    <div class="px-4 pb-2">
                    <x-primay-link href="{{route ('inscripcion.create', ['campeonato'=>$campeonato->hashid]) }}">{{__('Register') }} </x-primay-link >                     
                    </div>
                @endif

                @if ( Auth::user()->id == $campeonato->user_id)
                    
                    @if ($campeonato->num_bots > $campeonato->botsInscritos()->count() )
                        <div class="px-4 pb-2">
                        <x-primay-link href="{{route ('inscripcion.bot.create', ['campeonato'=>$campeonato->hashid]) }}"> {{__('Register Bots') }}</x-primay-link >  
                        </div>
                    @endif

                    @if ($campeonato->inscritos()->count() > 0  ) 
                        <div class="px-4 pb-2">  
                            <x-primary-button
                                x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'gestion-bots')">
                                {{__('Delete Registrations') }}
                            </x-primary-button>
                            @include('campeonato.partials.modales.gestion-inscritos')
                        </div>
                    
                    @endif

                    <div class="px-4 pb-2">
                        <x-danger-button
                            x-data=""
                            x-on:click.prevent="$dispatch('open-modal', 'confirm-campeonato-deletion')">
                            {{__('Delete Championship') }}
                        </x-danger-button>
                        
                        @include('campeonato.partials.modales.delete-campeonato')
                    </div>

                    @if ($campeonato->num_coches  == $campeonato->inscritos()->count())
                        <div class="px-4">
                            <form method="post" action="{{route ('campeonato.start', ['campeonato'=>$campeonato->hashid]) }}">
                            @csrf

                            <x-confirm nombre="start-championship">
                                <x-slot name="header">
                                    {{ __('Start Championship') }}
                                </x-slot>
                                {{ __('Are you sure you want to start championship? All championships specs won\'t be changed') }}
                            </x-confirm>

                                <x-primay-link onclick="toggleModal('start-championship')" > 
                                    {{__('Start Championship') }}
                                </x-primay-link>
                            </form>    
                        </div>
                    @endif
                @endif
           
                
            @endif <!-- campeonato activo-->
        @endif <!-- verified -->

    </div>
</section>



<script>

function toggleModal(modalID){
    
    document.getElementById(modalID).classList.toggle("hidden");
    document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
    document.getElementById(modalID).classList.toggle("flex");
    document.getElementById(modalID + "-backdrop").classList.toggle("flex");
  }
</script>