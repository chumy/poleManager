<div class="grid justify-items-end">
    

    <div class="relative inline-block text-right w-64" x-data="{ open: false }">
        <button @click="open = !open" class="text-amber-600 py-2 px-4 rounded inline-flex justify-between items-center  dark:text-gray-400">
            <span class="uppercase">{{ __("IDIOMA_ACTUAL") }}</span>
            

            <svg class="ml-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
        </button>

    <div x-show="open" 
        x-transition:enter="transition ease-out duration-300" 
        x-transition:enter-start="opacity-0 scale-95"
        x-transition:enter-end="opacity-100 scale-100" 
        x-transition:leave="transition ease-in duration-150" 
        x-transition:leave-start="opacity-100 scale-100" 
        x-transition:leave-end="opacity-0 scale-95" 
        class="absolute z-50 mt-2 w-full rounded-md   shadow-lg bg-white border border-gray-200 dark:bg-[#20293A] dark:border-slate-700">
        <div class="py-1 text-left text-gray-700 dark:text-gray-400 text-sm" role="menu" aria-orientation="vertical" aria-labelledby="options-menu">
            <a href="/lang/en" class="block px-4 py-2  hover:bg-amber-400 dark:hover:bg-[#161d2a]" role="menuitem">{{ __("English") }}</a>
            <a href="/lang/es" class="block px-4 py-2 hover:bg-amber-400 dark:hover:bg-[#161d2a]" role="menuitem">{{ __("Spanish") }} </a>
        </div>
    </div>


</div>