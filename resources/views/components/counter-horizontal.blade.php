
@props([
    'campo',
    'max',
    'valor',
])

    <!--div class="relative flex flex-col items-center max-w-[8rem]"-->
    <div class="flex flex-row border h-8 w-28 rounded-lg border-gray-400 relative"  >
        <span onclick="dec{{$campo}}()" class="font-semibold border-r bg-amber-500 hover:bg-gray-800 hover:text-gray-400 border-gray-400 h-full w-9 flex align-middle rounded-l focus:outline-none cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="m-2 " stroke-width="2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M5 12h14" />
            </svg>
        </span>

        <input type="text" name="{{$campo}}" id="{{$campo}}" value="{{ $valor }}" class="{{$campo}} outline-none w-10 focus:outline-none text-center bg-gray-800 font-semibold text-md hover:text-black focus:text-black  md:text-basecursor-default flex items-center text-gray-400" readonly ></input>

        <span onclick="inc{{$campo}}()" 
            class="w-9 h-full font-semibold border-r bg-amber-500 hover:bg-gray-800 hover:text-gray-400 border-gray-400  flex align-middle rounded-r focus:outline-none cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" class="m-2" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>

        </span>
        <div  class="absolute  flex-col p-2 w-32 md:w-full md:mt-8 mt-10  items-start justify-center z-10 hidden">
            <svg width="10" height="10" class="fill-current ml-5 md:mx-auto"> 
                <polygon points="0 10, 10 10, 5 0" />
            </svg>
            <span class="text-xs w-48 flex flex-wrap justify-center bg-black p-3 h-auto rounded-lg text-white">Input validation message</span>
        </div>

    </div>       
    
    
<script>

    function inc{{$campo}} ()
    {
        let counter=document.getElementById('{{$campo}}').value;
        //console.log(counter)
        counter++;
        @if ($max)
            counter=(counter > {{$max}}) ? {{$max}} : counter;
        @endif
        document.getElementById('{{$campo}}').value = counter;
    };

    function dec{{$campo}} () 
    {
        let counter=document.getElementById('{{$campo}}').value;
        counter--;
        counter=(counter < 0) ? 0 : counter;
        document.getElementById('{{$campo}}').value = counter;
    };
</script>

