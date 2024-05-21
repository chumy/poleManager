@props([
    'nombre',
])
<div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50   focus:outline-none justify-center items-center bg-gray-500/80" id="{{$nombre}}" >
  <div class="relative w-auto my-6 mx-auto max-w-3xl">
    <!--content-->
    <div class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline outline-offset-2 outline-amber-500 focus:outline-none">
      <!--header-->
      
      <!--body-->
      <div class="relative p-6 flex-auto">
        <p class="my-4 text-blueGray-500 text-lg leading-relaxed">

        <h2 class="text-lg font-medium text-gray-900">
            {{ $header }}
        </h2>
        <p class="mt-1 text-sm text-gray-600">
            {{ $slot }}
        </p>

        

        

        </p>
      </div>
      <!--footer-->
      <div class="flex items-center justify-center p-6 border-t border-solid border-blueGray-200 rounded-b">
        <x-primary-button class="mx-4">
                    {{ __('OK') }}
        </x-primary-button>
      
      <x-primary-general-button  onclick="toggleModal('{{$nombre}}')">
                    {{ __('Cancel') }}
                </x-primary-general-button>
      </div>
    </div>
  </div>
</div>
<div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="{{$nombre}}-backdrop"></div>