<section>


<h2 class="sm:text-lg text-md font-medium  text-amber-500">
            {{ __("Team's Standings") }}
            
</h2>
<div class="flex flex-col pb-4">
    <div class="shadow overflow-hidden rounded-lg bg-gray-800 ">
        <div class="grid sm:grid-cols-5 grid-cols-2 bg-gray-800 text-xs  font-medium text-gray-400 ">
       
            <div class="hidden sm:grid place-items-center px-1 py-3  tracking-wider border-b-2">
            {{__('#')}}
            </div>
            <div class="grid place-items-center px-5 py-3  tracking-wider border-b-2 uppercase">
                {{__('Teams')}}
            </div>
            <div class="hidden sm:grid place-items-center px-5 py-3 text-center tracking-wider border-b-2 uppercase">
                {{__('Car')}} 
            </div>
            
            <div class="hidden sm:grid place-items-center px-5 py-3 text-center tracking-wider border-b-2 uppercase">
            {{__('Races')}}
            </div>
            <div class="grid place-items-center px-5 py-3 text-center tracking-wider border-b-2 uppercase">
            {{__('Points')}}
            </div>
           
    

            @foreach ($campeonato->getClasificacionEscuderias() as $resultado)
            <div class="hidden sm:grid place-items-center px-5 py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }} pl-4 text-center ">
                {{$loop->index + 1}}
            </div>
            <div class="grid place-items-center px-5 py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }} pl-4 text-center">
                <img class="object-cover h-6 " src=" {{ asset($resultado->escuderia->imagen)}} " alt="" loading="lazy" />
            </div>

            <div class="hidden sm:grid place-items-center px-5 py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }} pl-4 text-center">
                <img class="object-cover h-6 " src=" {{ asset($resultado->escuderia->coche->imagen)}} " alt="" loading="lazy" />
            </div>
           

            <div class="hidden sm:grid place-items-center px-5 py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }} pl-4 text-center">
                {{$campeonato->getCarrerasCompletas()}}
            </div>
            <div class="grid place-items-center px-5 py-3  tracking-wider {{($loop->odd) ? 'bg-black bg-opacity-20' :'' }} pl-4 text-center">
            {{$resultado->puntos}}
            </div>
          

            @endforeach
        
        </div>        
    </div>     
</div>     



<!-- Component End  -->

 
</section>