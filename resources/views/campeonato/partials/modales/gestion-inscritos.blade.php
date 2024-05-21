<x-modal name="gestion-bots" focusable>
<form method="post" action="{{route ('inscripcion.delete') }}">
            @csrf
            @method('delete')


            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete bots?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>
            <input type="hidden" value="{{$campeonato->hashid}}" name="campeonato">
        

            <div class="grid gap-4 grid-cols-1 grid-rows-1 text-slate-700 py-4">
                    
                @foreach ( $campeonato->inscritos()->get() as $inscrito)

                        <div class="px-4">
                                                               
                                <label class="inline-flex items-center cursor-pointer"> 
                                <x-checkbox name="inscritos[]" value="{{$inscrito->id}}">{{$inscrito->usuario()->first()->name}}</x-checkbox>
                                </label>
                            
                        </div>

                        @endforeach

                </div>
               
            

            <div class="mt-6 flex justify-center">
            <x-primay-link
                            x-data=""
                            x-on:click.prevent="$dispatch('close')">
                            {{__('Cancel') }} 
                        </x-primay-link>    
                <x-danger-button class="ms-3">
                    {{ __('Delete Registrations') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>