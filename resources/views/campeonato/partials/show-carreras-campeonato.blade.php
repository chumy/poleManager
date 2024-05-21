<section>


<!-- component -->
<div class="pt-2 sm:pt-8">
<h2 class="sm:text-lg text-md font-medium  text-amber-500">
            {{ __("Race's Standings") }}
</h2>
</div>
<!-- component -->
<div id="tab-contents">

@foreach($campeonato->carreras()->get() as $carrera)

    <div id="tab{{$loop->index}}" class="{{ ($loop->index != $carreraSel ) ? 'hidden' : ''}}">
        <div class=" w-full" >
            <div class="top flex py-4 select-none bg-gray-800 rounded px-4 my-4">
                <div class="heading text-gray-300 w-full pl-3 font-semibold my-auto text-xl">{{CountryFlag::get($carrera->circuito()->country)}}  {{$carrera->circuito()->nombre}} ({{$carrera->orden}}/{{$campeonato->carreras()->count()}})</div>
                <div class="buttons ml-auto flex text-gray-600 mr-1 bg-white rounded">
                    <svg action="prev" id="prev" onclick="prevTab()" class="w-7 border-2 rounded-l-lg p-1 cursor-pointer border-r-0" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path action="prev" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" /></svg>
                    <svg action="next" id="next" onclick="nextTab()" class="w-7 border-2 rounded-r-lg p-1 cursor-pointer" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path action="next" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                </div>
            </div>
            <div class="content-area w-full overflow-hidden">
                
                    @include('campeonato.partials.show-carrera-frame')
                
            </div>
        </div>
    </div>
    @endforeach
</div>

                                            

<script>
    var carreras={{$campeonato->carreras()->count()}} -1
    var counter={{$carreraSel}};

    function nextTab(){
            //console.log('next '+counter)
                
                counter++;
                if(counter >= carreras){
                    counter = carreras;
                }
                showTab('tab'+counter);
               // console.log(counter);

    }
    
    function prevTab(){
        //console.log('prev '+counter)
        counter--
        if(counter < 0){
            counter = 0
        }
        showTab('tab'+counter);
        //console.log(counter);

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
 
</script>


           
            <!-- frame end -->


      

<!-- Component End  -->





</section>