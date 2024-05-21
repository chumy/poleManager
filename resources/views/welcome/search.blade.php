<div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
    <div class="flex flex-col sm:flex-row pt-2 sm:pt-8 pb-2 w-full">
        <div class="max-w-7xl w-full ">
            <div class="sm:p-4 p-2 bg-gray-900 shadow sm:rounded-lg rounded sm:mr-3 mb-2 sm:mb-0">
                <div class="max-w-7xl">
                
                
                <header>
                    <h2 class="sm:text-lg text-md font-medium text-amber-500">
                        {{ __('Search Championship') }}
                    </h2>

                    <p class="hidden sm:flex mt-1 text-sm text-gray-600">
                        {{ __("Text Championship's code.") }}
                    </p>
                </header>


                    <div class="grid gap-4 content-start relative">
                        <div >
                            <x-text-input id="searchChampionship" name="searchChampionship" type="text" class="mt-1 block w-full" value="{{ old('hashid') }}"/>
                 
                            <div id="searchChampionship_list"></div>
                        </div>

                        <x-input-error :messages="$errors->get('searchCampeonato')" class="mt-2" />
                    </div>


    

                </div>
            </div>
        </div>



        <div class="max-w-7xl  w-full">
            <div class="sm:p-4 p-2 bg-gray-900 shadow sm:rounded-lg rounded sm:ml-3">
                <div class="max-w-7xl">
                
                
                <header>
            <h2 class="sm:text-lg text-md font-medium text-amber-500">
                {{ __('Search Driver') }}
            </h2>

            <p class="hidden sm:flex mt-1 text-sm text-gray-600">
                {{ __("Text Driver's code.") }}
            </p>
        </header>
        
            <div class="grid gap-4 content-start relative">
                <div >
                    <x-text-input id="searchDriver" name="searchDriver" type="text" class="mt-1 block w-full"/>
                    <div id="searchDriver_list"></div>
                </div>
            </div>

        <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script>


    $(document).ready(function(){
        $('#searchDriver').on('keyup',function(){
            var query= $(this).val(); 
            if(query.length > 2)
            {
                var query= $(this).val(); 
                $.ajax({
                    url:"/search",
                    type:"GET",
                    datatype: 'json',
                    data:{'search':query, 'driver': '1'},
                    success:function(data){ 
                        $('#searchDriver_list').html(data);
                        document.getElementById('searchDriver_list').classList.remove('hidden');
                    }
                });
                //end of ajax call
            }
        });
    });

    

    $(document).ready(function(){
        $('#searchChampionship').on('keyup',function(){
            var query= $(this).val(); 
            if(query.length > 2)
            {
                var query= $(this).val(); 
                $.ajax({
                    url:"/search",
                    type:"GET",
                    datatype: 'json',
                    data:{'search':query, 'campeonato': '1'},
                    success:function(data){ 
                        $('#searchChampionship_list').html(data);
                        document.getElementById('searchChampionship_list').classList.remove('hidden');
                    }
                });
                //end of ajax call
            }
        });
    });

    
        function toggleSearchDropdown() {
            document.getElementById('searchDriver_list').classList.add('hidden');
            document.getElementById('searchChampionship_list').classList.add('hidden');
        }

        window.addEventListener('click', (event) => {
            toggleSearchDropdown();
        });
   
</script>
    

                </div>
            </div>
        </div>
    </div>
</div>