<div class="flex flex-col sm:m-2 sm:py-2 m-1 py-1 px-2 sm:px-4 bg-gray-600 rounded">
    <div class="items-center text-center sm:text-md text-xs text-gray-300 font-extrabold text-balance">{{$titulo}}</div>
    <div class="{{($valor < $minbronze ) ? 'grayscale' : ''}} flex justify-center">
        <img src="{{ asset('images/Logros/'.$imagen.'_bronze.png')}}" class="sm:h-24 h-12 "/>
    </div>
    <div class="text-center font-bold w-full">{{$valor}}/{{$minbronze}}</div>
    <div class="flex w-full px-4">
        <div class="overflow-hidden bg-blue-50 h-1.5 rounded-full w-full flex-row">
        <span
            class="h-full bg-amber-500 w-full block rounded-full"
            style="width: {{$valor/$minbronze*100}}%"></span>
        </div>
    </div>
</div>
  <div class="flex flex-col sm:m-2 sm:py-2 m-1 py-1 px-2 sm:px-4 bg-gray-600 rounded">
        <div class="items-center text-center sm:text-md text-xs text-gray-300 font-extrabold text-balance">{{$titulo}}</div>
        <div class="{{($valor < $minplata ) ? 'grayscale' : ''}} flex justify-center">
            <img src="{{ asset('images/Logros/'.$imagen.'_plata.png')}}" class="sm:h-24 h-12 "/>
        </div>
        <div class="text-center font-bold">{{$valor}}/{{$minplata}}</div>
        <div class="flex w-full px-4">
            <div class="overflow-hidden bg-blue-50 h-1.5 rounded-full w-full flex-row">
                <span
                class="h-full bg-amber-500 w-full block rounded-full"
                style="width: {{$valor/$minplata*100}}%" ></span>
            </div>
        </div>
  </div>
  <div class="flex flex-col sm:m-2 sm:py-2 m-1 py-1 px-2 sm:px-4 bg-gray-600 rounded">
        <div class="items-center text-center sm:text-md text-xs text-gray-300 font-extrabold text-balance">{{$titulo}}</div>
        <div class="{{($valor < $minoro) ? 'grayscale' : ''}} flex justify-center">
            <img src="{{ asset('images/Logros/'.$imagen.'_oro.png')}}" class="sm:h-24 h-12 "/>
        </div>
        <div class="text-center font-bold">{{$valor}}/{{$minoro}}</div>
        <div class="flex w-full px-4">
            <div class="overflow-hidden bg-blue-50 h-1.5 rounded-full w-full flex-row">
                <span
                class="h-full bg-amber-500 w-full block rounded-full"
                style="width: {{$valor/$minoro*100}}%"></span>
            </div>
        </div>
  </div>
        