<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Applicants') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <h1 class="mb-10 text-center text-2xl font-bold"><a href="{{route('vacantes.show',$vacante)}}">Candidatos {{ $vacante->titulo }}</a></h1>

                    <div class="p-5 md:flex md:justify-center ">
                        <ul class="w-full divide-y divide-solid divide-gray-300 dark:divide-gray-600 ">
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
                                    <div>
                                        <a href="{{asset('storage/cv/'.$candidato->CV)}}"
                                            class="inline-flex h-fit w-fit rounded-sm bg-slate-700 px-4 py-2 text-sm font-bold text-gray-50 transition hover:bg-slate-900 dark:bg-slate-400 dark:text-gray-900 dark:hover:bg-slate-100"
                                            target="_blank"
                                            rel="noreferrer noopener">Ver
                                            CV</a>
                                    </div>
                                </li>
                            @empty
                                <p class="py-4 text-center dark:text-gray-200">Aún no hay candidatos</p>
                            @endforelse
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
