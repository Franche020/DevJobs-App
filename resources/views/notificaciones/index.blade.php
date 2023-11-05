<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Notifications') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h1 class="mb-10 text-center text-2xl font-bold">Notificaciones</h1>
                    <div class="divide-y divide-solid divide-gray-300 dark:divide-gray-600">
                        @forelse ($notificaciones as $notificacion)
                            <div
                                class="mb-3 flex flex-col justify-between rounded-md lg:flex-row lg:items-center">
                                <div>
                                    <p>Tienes un nuevo candidato en <a
                                            href="{{ route('vacantes.show', $notificacion->data['id_vacante']) }}"
                                            class="font-bold">{{ $notificacion->data['nombre_vacante'] }}</a></p>
                                    <p class="text-gray-600 dark:text-gray-400">
                                        {{ $notificacion->created_at->diffForHumans() }}</p>
                                </div>
                                <div>
                                    <a href="{{ route('candidatos.index', $notificacion->data['id_vacante']) }}"
                                        class="h-fit w-fit rounded-sm bg-slate-700 px-4 py-2 text-sm font-bold text-gray-50 transition hover:bg-slate-900 dark:bg-slate-400 dark:text-gray-900 dark:hover:bg-slate-100">Candidatos</a>
                                </div>
                            </div>
                        @empty
                            <p class="py-4 text-center dark:text-gray-200">No hay notificaciones</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
