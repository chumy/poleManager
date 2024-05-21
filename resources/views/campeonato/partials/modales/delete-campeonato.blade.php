<x-modal name="confirm-campeonato-deletion" focusable>
<form method="post" action="{{route ('campeonato.destroy', ['campeonato'=>$campeonato]) }}">

            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Are you sure you want to delete your championship?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-600">
                {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
            </p>

            

            <div class="mt-6 flex justify-center">
                <x-primary-button 
                    x-on:click="$dispatch('close')">
                    {{ __('Cancel') }}
                </x-primary-button>

                <x-danger-button class="ms-3">
                    {{ __('Delete Championship') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>