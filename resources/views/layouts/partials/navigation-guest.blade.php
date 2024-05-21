<!--div :class="{'block': open, 'hidden': ! open}" class="hidden ">
        @if (Route::has('register'))
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('login')" :active="request()->routeIs('login')">
                {{ __('Login') }}
            </x-responsive-nav-link>
        </div>

        @endif
        @if (Route::has('register'))
        <div class="pt-2 pb-3 space-y-1">
             <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
            
        </div>
        @endif
    </div>
    
            
</div-->                

<div class="grid justify-items-end">
    

    

    <div x-show="open" 
        x-transition:enter="transition ease-out duration-300" 
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100" 
        x-transition:leave="transition ease-in duration-150" 
        x-transition:leave-start="opacity-100 scale-100" 
        x-transition:leave-end="opacity-0 scale-95" 
        class="absolute z-50 mt-2  rounded-md w-32  shadow-lg bg-white border border-gray-200 dark:bg-[#20293A] dark:border-slate-700">
        <div class="py-1 text-gray-700 dark:text-gray-400 text-sm" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
            @if (Route::has('register'))
                <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('login')" >
                        {{ __('Login') }}
                    </x-responsive-nav-link>
                </div>

            @endif
            @if (Route::has('register'))

            <div class="pt-2 pb-3 space-y-1">
                    <x-responsive-nav-link :href="route('register')" >
                        {{ __('Register') }}
                    </x-responsive-nav-link>
                </div>
            @endif
        </div>
    </div>


</div>
        