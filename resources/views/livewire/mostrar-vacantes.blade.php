<div class="overflow-hidden rounded-lg bg-white shadow-sm dark:bg-gray-800">
    @forelse ($vacantes as $vacante)
        <div
            class="flex flex-col gap-2 border-b border-gray-300 p-6 text-gray-900 last:border-none dark:border-gray-700 dark:text-gray-50 md:flex-row md:items-center md:justify-between">
            <div class="space-y-4">
                <a href="{{ route('vacantes.show', $vacante) }}">
                    <p class="text-xl font-bold">{{ $vacante->titulo }}</p>
                </a>
                <p class="text-sm font-bold text-gray-700 dark:text-gray-200">{{ $vacante->empresa }}</p>
                <p class="text-sm text-gray-500 dark:text-gray-400">Ultimo día:
                    {{ $vacante->ultimo_dia->format('d/m/Y') }}</p>
            </div>
            <div class="flex flex-row gap-2 md:justify-between md:gap-10">
                <a href="{{ route('candidatos.index', $vacante->id) }}"
                    class="h-fit w-fit rounded-sm bg-slate-700 px-4 py-2 text-sm font-bold text-gray-50 transition hover:bg-slate-900 dark:bg-slate-400 dark:text-gray-900 dark:hover:bg-slate-100">{{ $vacante->candidatos->count() }}
                    @choice('Candidato|Candidatos', $vacante->candidatos->count())</a>
                <a href="{{ route('vacantes.edit', $vacante->id) }}"
                    class="h-fit w-fit rounded-sm bg-indigo-700 px-4 py-2 text-sm font-bold text-gray-50 transition hover:bg-slate-900 dark:bg-indigo-400 dark:text-gray-900 dark:hover:bg-slate-100">Editar</a>
                <button wire:click='$dispatch("alertaBorrarVacante",{vacante: {{ $vacante->id }}})' href="#"
                    class="h-fit w-fit rounded-sm bg-pink-950 px-4 py-2 text-sm font-bold text-gray-50 transition hover:bg-slate-900 dark:bg-red-400 dark:text-gray-900 dark:hover:bg-slate-100">Eliminar</button>
            </div>
        </div>
    @empty
        <p class="py-4 text-center dark:text-gray-200">No hay vacantes, pulsa <a
                class="rounded-sm px-1 py-2 font-bold transition hover:bg-indigo-400 dark:hover:text-gray-50"
                href="{{ route('vacantes.create') }}">aquí</a> para crear una</p>
    @endforelse
    {{ $vacantes->onEachSide(2)->links('pagination::tailwind') }}

    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/dark.min.css') }}">
    @endpush
</div>
