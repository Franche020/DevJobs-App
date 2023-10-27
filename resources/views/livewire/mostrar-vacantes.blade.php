<div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800">
    @forelse ($vacantes as $vacante)
        <div class="p-6 text-gray-900 border-b border-gray-300 flex gap-2 flex-col md:flex-row md:justify-between md:items-center
                     dark:border-gray-700 dark:text-gray-50">
            <div class="space-y-4">
                <a href="#">
                    <p class="text-xl font-bold">{{$vacante->titulo}}</p>
                </a>
                <p class="text-sm font-bold text-gray-700 dark:text-gray-200">{{$vacante->empresa}}</p>
                <p class="text-sm text-gray-500 dark:text-gray-400">Ultimo día: {{$vacante->ultimo_dia->format('d/m/Y')}}</p>
            </div>
            <div class="flex gap-2 md:gap-10 flex-row md:justify-between">
                <a href="#" class="h-fit w-fit py-2 px-4 rounded-sm font-bold text-sm text-gray-50 bg-slate-700 transition
                            hover:bg-slate-900 dark:text-gray-900 dark:bg-slate-400 dark:hover:bg-slate-100  ">Candidatos</a>
                <a href="{{route('vacantes.edit', $vacante->id)}}" class="h-fit w-fit py-2 px-4 rounded-sm font-bold text-sm text-gray-50 bg-indigo-700 transition
                            hover:bg-slate-900 dark:text-gray-900 dark:bg-indigo-400 dark:hover:bg-slate-100  ">Editar</a>
                <a href="#" class="h-fit w-fit py-2 px-4 rounded-sm font-bold text-sm text-gray-50 bg-pink-950 transition
                            hover:bg-slate-900 dark:text-gray-900 dark:bg-red-400 dark:hover:bg-slate-100  ">Eliminar</a>
            </div>
        </div>
    @empty
        <p class="text-center dark:text-gray-200 py-4">No hay vacantes, pulsa <a 
            class="font-bold py-2 px-1 rounded-sm hover:bg-indigo-400 dark:hover:text-gray-50 transition" 
            href="{{route('vacantes.create')}}">aquí</a> para crear una</p>
    @endforelse
        {{$vacantes->onEachSide(2)->links('pagination::tailwind')}}


</div>
