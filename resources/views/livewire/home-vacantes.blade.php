<div>
    <livewire:filtrar-vacantes />
    <div class="p-12">
        <div class="max-w-7xl mx-auto">
            <h3 class="font-extrabold text-4xl text-gray-800 dark:text-gray-300 mb-12">Nuestra Vacantes Disponibles</h3>
            <div class="bg-gray-50 dark:bg-gray-700 shadow-sm rounded-lg p-6 divide-y divide-solid divide-gray-300 dark:divide-gray-600">
                @forelse ($vacantes as $vacante)
                    <div class="md:flex md:justify-between md:items-center py-5">
                        <div class="md:flex-1">
                            <a class="text-3xl font-extrabold text-gray-700 dark:text-gray-200" href="{{route('vacantes.show',$vacante->id)}}">{{$vacante->titulo}}</a>
                            <p class="text-base text-gray-600 dark:text-gray-300 mb-3">{{$vacante->empresa}}</p>
                            <p class="text-base text-gray-700 dark:text-gray-200">Ultimo día para Postularse: <span class="font-bold text-gray-600 dark:text-gray-300">{{$vacante->ultimo_dia->format('Y-m-d')}}</span></p>
                        </div>
                        <div class="mt-5 md:mt-0">
                            <a href="{{route('vacantes.show',$vacante->id)}}" class="block h-fit md:w-fit rounded-sm text-center bg-indigo-700 px-4 py-2 text-sm font-bold text-gray-50 transition hover:bg-slate-900 dark:bg-indigo-400 dark:text-gray-900 dark:hover:bg-slate-100" ">Ver Vacante</a>
                        </div>
                    </div>
                @empty
                <p class="py-4 text-center dark:text-gray-200">Aún no hay Vacantes</p>
                @endforelse
            </div>
            {{ $vacantes->onEachSide(2)->links('pagination::tailwind') }}
        </div>
    </div>
</div>
