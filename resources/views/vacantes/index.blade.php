<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Vacantes') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if (session()->has('mensaje'))
                <div class="bg-green-100 text-sm  text-green-700 border-l-4 border-green-700 my-2 py-1 space-y-1
                            dark:bg-green-600 dark:text-gray-100 dark:border-green-100">
                    <p class="pl-2">{{session('mensaje')}}</p>
                </div>
            @endif

            <div >
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    Vacantes
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
