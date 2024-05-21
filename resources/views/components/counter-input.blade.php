
@props([
    'name',
    'max',
    'clase'
])

    <div class="relative flex flex-col items-center max-w-[8rem]">
        <span >

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="rgb(245 158 11)" class="w-6 h-6 m-1 " id="increment-{{$name}}-button">
              <path fill-rule="evenodd" 
                d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM12.75 9a.75.75 0 0 0-1.5 0v2.25H9a.75.75 0 0 0 0 1.5h2.25V15a.75.75 0 0 0 1.5 0v-2.25H15a.75.75 0 0 0 0-1.5h-2.25V9Z" clip-rule="evenodd" />
            </svg>

        </span>
        <span>
            <label id="lbl-{{$name}}">0</label>
        <input type="hidden" id="{{$name}}" name="{{$name}}" data-input-counter aria-describedby="helper-text-explanation" 
            class="{{$clase}} bg-gray-50 w-8 border-x-0 border-gray-300 h-8 text-center px-1 text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block  py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
            value="0" required />
        </span>
        <span>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="rgb(245 158 11)" class="w-6 h-6 m-1  " id="decrement-{{$name}}-button">
            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25Zm3 10.5a.75.75 0 0 0 0-1.5H9a.75.75 0 0 0 0 1.5h6Z" clip-rule="evenodd" />
            </svg>

        </span>

    </div>       
    
    
<script>

    document.getElementById('increment-{{$name}}-button').addEventListener("click", () => {
        let counter=document.getElementById('{{$name}}').value;
        counter++;
        @if ($max)
            counter=(counter > {{$max}}) ? {{$max}} : counter;
        @endif
        document.getElementById('lbl-{{$name}}').innerHTML = counter;
        document.getElementById('{{$name}}').value = counter;
    });

    document.getElementById('decrement-{{$name}}-button').addEventListener("click", () => {
        let counter=document.getElementById('{{$name}}').value;
        counter--;
        counter=(counter < 0) ? 0 : counter;
        document.getElementById('lbl-{{$name}}').innerHTML = counter;
        document.getElementById('{{$name}}').value = counter;
    });
</script>