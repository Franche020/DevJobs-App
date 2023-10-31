<div>
    <div class="mb-5">
        <h3 class="font-bold text-3xl my-3">{{$vacante->titulo}}</h3>
        <div class="md:grid md:grid-cols-2 md:gap-4 p-4 my-10 bg-gray-100 dark:bg-gray-700 rounded-md">
            <p class="text-sm text-gray-700 dark:text-gray-300">Empresa: <span class="uppercase font-bold">{{$vacante->empresa}}</span></p>
            <p class="text-sm text-gray-700 dark:text-gray-300">Último día: <span class="uppercase font-bold">{{$vacante->ultimo_dia->isoformat('DD/MM/YYYY')}}</span></p>
            <p class="text-sm text-gray-700 dark:text-gray-300">Categoría: <span class="uppercase font-bold">{{$vacante->categoria->categoria}}</span></p>
            <p class="text-sm text-gray-700 dark:text-gray-300">Salario: <span class="uppercase font-bold">{{$vacante->salario->salario}}</span></p>
        
        </div> 
    </div>
    <div class="md:grid md:grid-cols-6 gap-4">
        <div class="md:col-span-2">
            <a href="{{asset('storage/vacantes/'.$vacante->imagen)}}">
                <img class="rounded-md" src="{{asset('storage/vacantes/'.$vacante->imagen)}}" alt="Imagen de la vacante {{$vacante->titulo}}">
            </a>    
        </div>
        <div class="md:col-span-4">
            <h2 class="text-2xl font-bold mb-2">Descripcion del puesto</h2>
            <p>{{$vacante->descripcion}}</p>
        </div>
    </div>
    @guest
        <div class="mt-5 bg-gray-50 dark:bg-gray-700 dark:border-gray-500 border border-dashed p-5 text-center rounded-md">
            <p>¿Deseas aplicara esta Vacante? <a href="{{route('register')}}" class="font-bold text-indigo-500 dark:text-indigo-400">Obten una cuenta y aplica a estas y otras vacantes</a></p>
        </div>
    @endguest
    @auth
        @cannot('create', App\Models\Vacante::class)
            <livewire:postular-vacante 
            :vacante="$vacante"
            />
        @endcannot
    @endauth
</div>
