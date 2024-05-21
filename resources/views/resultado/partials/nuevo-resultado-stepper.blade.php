
<section>
    <header>
    <h2 class="text-xl  text-white font-extrabold">{{CountryFlag::get($carrera->circuito()->country)}} {{$carrera->circuito()->nombre}} ({{$carrera->orden}}/{{$carrera->campeonato()->num_carreras}}) {{ __('Add Results')}}  </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Ensure your account is using a long, random password to stay secure.') }}
        </p>
    </header>

    @if (Auth::id() == $carrera->campeonato()->user_id )
    <div class="flex justify-center mt-2">
        @foreach ($carrera->campeonato()->inscritos()->get() as $inscrito)
        
            <div class="flex flex-col justify-center items-center">
                <img src="{{ asset($inscrito->usuario()->first()->avatar)}}" alt="{{$inscrito->usuario()->first()->name}}" class=" mx-2 sm:w-16 sm:h-16 w-9 h-9 object-cover rounded-full"
                onclick="showTab('tab{{$inscrito->id}}');">
                <div class="flex flex-row items-center">    
                            <div class="w-full flex-none sm:text-base text-sm text-center text-gray-400 font-bold leading-none">{{$inscrito->usuario()->first()->name}}</div>
                        </div>
            </div>
        @endforeach
    </div>
    @endif
    <form method="post" id="resultadoForm" action="{{ route('resultado.storeAll') }}" class="mt-6 "> 
        @csrf
        <div id="tab-contents">

            @foreach ($carrera->campeonato()->inscritos()->get() as $inscrito)

                <div id="tab{{$inscrito->id}}" class="{{ ($inscrito->id != 1 ) ? 'hidden' : ''}}">
                    
                @include('resultado.partials.resultado-stepper-individual')
                            
                </div>
            @endforeach
        </div>
    </form>

<x-alert-modal nombre="alert-missing-qualy">
        <x-slot name="header">
            {{ __('Missing values on Qualification') }}
        </x-slot>
        {{ __('Review all values set on Qualifications fields.') }}
</x-alert-modal>

<x-alert-modal nombre="alert-duplicate-qualy">
        <x-slot name="header">
            {{ __('Duplicated Qualification values') }}
        </x-slot>
        {{ __('Review all values set on Qualifications fields.') }}
</x-alert-modal>    
                        
<x-alert-modal nombre="alert-empty-pos">
        <x-slot name="header">
            {{ __('No Position values') }}
        </x-slot>
        {{ __('Fill at least one Position field.') }}
</x-alert-modal>    

<x-alert-modal nombre="alert-duplicate-pos">
        <x-slot name="header">
            {{ __('Duplicated Position values ') }}
        </x-slot>
        {{ __('Review all values set on Position fields.') }}
</x-alert-modal>  

    <script>

    function saveAllResults() {
        if(checkQualy() && checkPosition()){
            return true;
        }
        return false;

    }

    function showTab(tabName){

        let tabContents = document.querySelector("#tab-contents");
        for (let i = 0; i < tabContents.children.length; i++) {

            tabContents.children[i].classList.remove("hidden");
            if (tabContents.children[i].id === tabName) {
                continue;
            }
            tabContents.children[i].classList.add("hidden");

        }
        return true;

    }

    function onlyUnique(value, index, array) {
        return array.indexOf(value) === index;
    }

    
  function toggleModal(modalID){
    document.getElementById(modalID).classList.toggle("hidden");
    document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
    document.getElementById(modalID).classList.toggle("flex");
    document.getElementById(modalID + "-backdrop").classList.toggle("flex");
  }

    
    function checkQualy(){
        let inscritos = {{$carrera->campeonato()->inscritos()->count()}};
        let puntos = [];
        let qualyPoints = document.getElementsByClassName("qualy");
        for (let i = 0; i < qualyPoints.length; i++) {
            puntos.push(qualyPoints[i].value)
        }
        qualyUnique = puntos.filter(onlyUnique);
        if (qualyUnique.includes("0")){
            toggleModal('alert-missing-qualy')
            return false;
        }
          
        if (qualyUnique.length != inscritos){
            toggleModal('alert-duplicate-qualy')
            return false;
        }
        
        return true;
    }

    function checkPosition(){
        let inscritos = {{$carrera->campeonato()->inscritos()->count()}};
        let puntos = [];
        let positionPoints = document.getElementsByClassName("posicion");
        for (let i = 0; i < positionPoints.length; i++) {
            if (positionPoints[i].value > 0)
                puntos.push(positionPoints[i].value)
        }
        qualyUnique = puntos.filter(onlyUnique);
        if (qualyUnique.length == 0){
            toggleModal('alert-empty-pos')
            return false;
        }
          
        if (qualyUnique.length != puntos.length){
            toggleModal('alert-duplicate-pos')
            return false;
        }
        
        return true;
    }
</script>    


</section>
