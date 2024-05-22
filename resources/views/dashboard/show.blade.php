<x-app-layout>

<div class="pt-4 sm:pt-6 pb-2">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 ">
        <div class="sm:p-4 p-2 bg-gray-900 shadow rounded-lg ">
            <div class="max-w-7xl">

                <!-- Header -->
                @include('dashboard.partials.header')
            
            </div>
        </div>
    </div>
</div>
   

   
             

                <!-- OPCIONES -->
                <!--include('welcome.search')-->
                            
     

<div class="pt-2 sm:pt-4 pb-2">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 ">
        <div class="sm:p-4 p-2 bg-gray-900 shadow rounded-lg ">
            <div class="max-w-7xl">

             
                    <!-- En CurSO -->
                
                    @include('dashboard.partials.listado-inscritos')
                    

                    <!-- FINALIZADOS -->
               
                </div>
            </div>
        </div>
    </div>

    <div class="pt-2 sm:pt-4 pb-2">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 ">
            <div class="sm:p-4 p-2 bg-gray-900 shadow rounded-lg ">
                <div class="max-w-7xl">
    
                 
                        <!-- En CurSO -->
                    
                        @include('dashboard.partials.listado-own')
                        
    
                        <!-- FINALIZADOS -->
                   
                    </div>
                </div>
            </div>
        </div>
<div class="pt-2 sm:pt-4 pb-2">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 ">
        <div class="sm:p-4 p-2 bg-gray-900 shadow rounded-lg ">
            <div class="max-w-7xl">

                
                    @include('dashboard.partials.logros')
                    
                    <div class="mt-3"> 
                        <x-primay-link href='{{route ("welcome") }}' >
                            {{ __('Back') }}
                        </x-primay-link>
                        </div>
               
                </div>
            </div>
        </div>
    </div>

  
</x-app-layout>
