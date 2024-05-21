<h2 class="text-lg font-medium text-amber-500">
            {{ __('Achievements') }}
        </h2>




<div class="my-2 space-y-2">
    <div class="group flex flex-col gap-2 rounded-lg bg-gray-700 py-2 p-3 text-white" tabindex="1">   
      <div class="flex cursor-pointer items-center justify-between px-2" onclick="showLogro('core')">

        <div class="flex place-content-center">
          <div class="flex"> <x-application-logo class="flex h-10"></x-application-logo></div>
          <div class="flex items-center text-center text-xl text-gray-300 font-extrabold px-4">{{__("Core")}}</div>
        </div>
        <img
          onclick="showLogro('core')"
          src="https://upload.wikimedia.org/wikipedia/commons/9/96/Chevron-icon-drop-down-menu-WHITE.png"
          class="h-2 w-3 "
        />
      </div>
      <div id="core" class="tabLogro hidden">
        <div class="flex-wrap flex">
          <x-logros valor="{{$user->getCampeonatosGanados()}}" 
                    titulo="{{__('Championships')}}" 
                    imagen='campeonato' 
                    minbronze='10' minplata='25' minoro='50'>
          </x-logros>

          <x-logros valor="{{$user->getCountResults('posicion','1')}}" 
                    titulo="{{__('Victories')}}" 
                    imagen='wins' 
                    minbronze='25' minplata='50' minoro='100'>
          </x-logros>
          <x-logros valor="{{$user->getCountResults('qualy','1')}}" 
                    titulo="{{__('Poles')}}" 
                    imagen='pole' 
                    minbronze='25' minplata='50' minoro='100'>
          </x-logros>


        </div>
      </div>
    </div>

      <div class="group flex flex-col gap-2 rounded-lg bg-gray-700 py-2 p-3 text-white" tabindex="2">   
        <div class="flex cursor-pointer items-center justify-between px-2" onclick="showLogro('driving-skills')">
  
          <div class="flex place-content-center">
            <div class="flex"> <x-application-logo class="flex h-10"></x-application-logo></div>
            <div class="flex items-center text-center text-xl text-gray-300 font-extrabold px-4">{{__("Driving Skills")}}</div>
          </div>
          <img
            onclick="showLogro('driving-skills')"
            src="https://upload.wikimedia.org/wikipedia/commons/9/96/Chevron-icon-drop-down-menu-WHITE.png"
            class="h-2 w-3 "
          />
        </div>
        <div id="driving-skills" class="tabLogro hidden">
          <div class="flex-wrap flex">
            <x-logros valor="{{$user->getAchievements()->sum('adelantamientos')}}" 
              titulo="{{__('Overtakes')}}" 
              imagen='pole' 
              minbronze='25' minplata='50' minoro='100'>
            </x-logros>
            <x-logros valor="{{$user->getAchievements()->sum('ataques')}}" 
              titulo="{{__('Offensive')}}" 
              imagen='ataque' 
              minbronze='25' minplata='50' minoro='100'>
            </x-logros>
            <x-logros valor="{{$user->getAchievements()->sum('defensas')}}" 
              titulo="{{__('Defender')}}" 
              imagen='defensa' 
              minbronze='25' minplata='50' minoro='100'>
            </x-logros>
            <x-logros valor="{{$user->getAchievements()->sum('colisiones')}}" 
              titulo="{{__('Collisions')}}" 
              imagen='colision' 
              minbronze='25' minplata='50' minoro='100'>
            </x-logros>
            <x-logros valor="{{$user->getAchievements()->sum('averias_leves')}}" 
              titulo="{{__('Careless')}}" 
              imagen='leve' 
              minbronze='25' minplata='50' minoro='100'>
            </x-logros>
            <x-logros valor="{{$user->getAchievements()->sum('averias_graves')}}" 
              titulo="{{__('Risky')}}" 
              imagen='grave' 
              minbronze='25' minplata='50' minoro='100'>
            </x-logros>
            <x-logros valor="{{$user->getAchievements()->sum('reparaciones_leves')}}" 
              titulo="{{__('Cautious')}}" 
              imagen='leve_reparada' 
              minbronze='25' minplata='50' minoro='100'>
            </x-logros>
            <x-logros valor="{{$user->getAchievements()->sum('reparaciones_graves')}}" 
              titulo="{{__('Lucky')}}" 
              imagen='grave_reparada' 
              minbronze='25' minplata='50' minoro='100'>
            </x-logros>
            <x-logros valor="{{$user->getCountResults('puntos_motor','0')}}" 
              titulo="{{__('Press Engine')}}" 
              imagen='desgaste' 
              minbronze='25' minplata='50' minoro='100'>
            </x-logros>
          </div>
        </div>
      </div>


  @foreach($circuitos as $circuito)
  <div class="group flex flex-col gap-2 rounded-lg bg-gray-700 p-5 text-white" tabindex="{{$loop->index +2}}">
    <div class="flex cursor-pointer items-center justify-between" onclick="showLogro('circuito{{$circuito->id}}')">
      <div class="flex place-content-center" >
          <div class="flex "> {{CountryFlag::get($circuito->country)}}</div>
          <div class="flex items-center text-center text-xl text-gray-300 font-extrabold px-4">{{__($circuito->nombre)}}</div>
      </div>
      <img onclick="showLogro('circuito{{$circuito->id}}')"
        src="https://upload.wikimedia.org/wikipedia/commons/9/96/Chevron-icon-drop-down-menu-WHITE.png"
        class="h-2 w-3"
      />
    </div>
    
    <div id="circuito{{$circuito->id}}" class="tabLogro items-center hidden"    >
      <div class="flex-wrap flex">
        <x-logros valor="{{$user->getResultsRace($circuito->id)}}" 
                  titulo="{{__('Races')}}" 
                  imagen="{{$circuito->nombre}}"
                  minbronze='25' minplata='50' minoro='100'>
        </x-logros>

        <x-logros valor="{{$user->getCampeonatosGanados()}}" 
                  titulo="{{__('Victories')}}" 
                  imagen="{{$circuito->nombre}}_win"
                  minbronze='10' minplata='25' minoro='50'>
        </x-logros>
        <x-logros valor="{{$user->getCampeonatosGanados()}}" 
                  titulo="{{__('Poles')}}" 
                  imagen="{{$circuito->nombre}}_pole"
                  minbronze='10' minplata='25' minoro='50'>
        </x-logros>
      </div>
    </div>
  </div>
  @endforeach

  <div class="group flex flex-col gap-2 rounded-lg bg-gray-700 py-2 p-3 text-white" tabindex="1">   
    <div class="flex cursor-pointer items-center justify-between px-2" onclick="showLogro('pilotos')">

      <div class="flex place-content-center">
        <div class="flex"> <img class="flex h-10" src="{{ asset('images/cartas_piloto.png')}}"></div>
        <div class="flex items-center text-center text-xl text-gray-300 font-extrabold px-4">{{__('Drivers')}}</div>
      </div>
      <img
        onclick="showLogro('pilotos')"
        src="https://upload.wikimedia.org/wikipedia/commons/9/96/Chevron-icon-drop-down-menu-WHITE.png"
        class="h-2 w-3 "
      />
    </div>
    <div id="pilotos" class="tabLogro hidden">

      <div class="flex-wrap flex">
        @foreach($pilotos->get() as $piloto)
          <x-logros valor="{{$user->getCartasPiloto($piloto->id)}}" 
                    titulo="{{$piloto->nombre}}" 
                    imagen='piloto{{$piloto->id}}' 
                    minbronze='10' minplata='25' minoro='50'>
          </x-logros>
        @endforeach
      </div>
    </div>
  </div>


</div>

<script>
function showLogro(tabName){

  let tabs = document.getElementsByClassName("tabLogro");
  for (let i = 0; i < tabs.length; i++) {

      tabs[i].classList.remove("hidden");
      if (tabs[i].id === tabName) {
          continue;
      }
      tabs[i].classList.add("hidden");

  }
  return true;
}
</script>