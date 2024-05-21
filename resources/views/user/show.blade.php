<x-app-layout>


                <!-- OPCIONES -->
                @include('welcome.search')

<div class="sm:pt-8 pt-2 pb-2">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
        <div class="sm:p-8 bg-gray-900 shadow sm:rounded-lg">
            <div class="max-w-7xl">
                <!-- Header -->
                @include('dashboard.partials.header')
            
            </div>
        </div>
    </div>
</div>
   

    <div class="py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
            <div class="sm:p-8 bg-gray-900 shadow sm:rounded-lg">
                <div class="max-w-7xl">

             
                    <!-- En CurSO -->
                
                    @include('dashboard.partials.listado-inscritos')
                    

                    <!-- FINALIZADOS -->
               
                </div>
            </div>
        </div>
    </div>

    <div class="py-4">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 ">
            <div class="sm:p-8 bg-gray-900 shadow sm:rounded-lg">
                <div class="max-w-7xl">

                
                    @include('dashboard.partials.logros')
                    

               
                </div>
            </div>
        </div>
    </div>

  
</x-app-layout>
