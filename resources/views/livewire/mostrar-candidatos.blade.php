<div class="w-full">
    <ul class="divide-y divide-solid divide-gray-300 dark:divide-gray-600 ">
        @forelse ($vacante->candidatos as $candidato)
            <li class="flex items-center p-6">
                <div class="flex-1">
                    <p class="text-xl font-medium text-gray-600 dark:text-gray-300">
                        {{ $candidato->user->name }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-300">
                        {{ $candidato->user->email }}</p>
                    <p class="text-sm font-medium text-gray-600 dark:text-gray-300">
                        Dia que se postuló: <span
                            class="font-normal">{{ $candidato->user->created_at->diffForHumans() }}</span>
                    </p>
                </div>
                <div class="flex flex-col gap-2 items-end">
                    <button wire:click='$dispatch("actualizarVista", {candidaturaId:{{$candidato->id}}})' class="cursor-pointer text-center h-fit w-32 rounded-sm {{$candidato->vista ? 'bg-slate-400 dark:bg-slate-500' : 'bg-green-700 dark:bg-green-400'}} px-4 py-2 text-sm font-bold text-gray-50 transition hover:bg-slate-900  dark:text-gray-900 dark:hover:bg-slate-100"> {{$candidato->vista ? 'Revisada' : 'No Revisada'}}</button>
                    <a href="{{asset('storage/cv/'.$candidato->CV)}}"
                        class="h-fit w-32 text-center rounded-sm bg-slate-700 px-4 py-2 text-sm font-bold text-gray-50 transition hover:bg-slate-900 dark:bg-slate-400 dark:text-gray-900 dark:hover:bg-slate-100"
                        target="_blank"
                        rel="noreferrer noopener">Ver CV</a>
                </div>
            </li>
        @empty
            <p class="py-4 text-center dark:text-gray-200">Aún no hay candidatos</p>
        @endforelse
    </ul>
</div>
