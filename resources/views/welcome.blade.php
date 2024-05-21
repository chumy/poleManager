<x-app-layout>
<!-- Search -->
@include('welcome.search')
            

<div class="pt-4 sm:pt-8 pb-2">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 ">
        <div class="sm:p-4 p-2 bg-gray-900 shadow rounded-lg ">
            <div class="max-w-7xl">
                <!-- Standings -->
                @include('welcome.standings')
            
            </div>
        </div>
    </div>
</div>
<div class="pt-2 sm:pt-6 pb-2">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8 ">
        <div class="sm:p-4 p-2 bg-gray-900 shadow rounded-lg">
            <div class="max-w-7xl">
                <!-- List  -->
                @include('welcome.list-championships')
            
            </div>
        </div>
    </div>
</div>
</x-app-layout>
