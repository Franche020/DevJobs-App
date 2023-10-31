<div class="mt-5 bg-gray-50 dark:bg-gray-700 dark:border-gray-500 p-5 rounded-md flex justify-center flex-col items-center">
    <h3 class="text-center text-2xl font-bold my-4">Postular a esta vacante</h3>
    @if (session()->has('mensaje'))
    <div class="bg-green-100 text-sm  text-green-700 border-l-4 border-green-700 my-2 py-1 space-y-1
                dark:bg-green-600 dark:text-gray-100 dark:border-green-100">
        <p class="px-2">{{session('mensaje')}}</p>
    </div>
    @endif
    <form class="w-96 mt-5" wire:submit.prevent="postularme">
        <div class="mb-5 rounded-none">
            <x-input-label for="cv" :value="__('Curriculum Vitae')"/>
            <x-text-input id="cv" class="block mt-1 w-full" wire:model='cv' type="file" wire:model="cv"  
            accept=".pdf"/>
            @error('cv') <livewire:mostrar-alerta :message="$message"/> @enderror
        </div>
        <x-primary-button class="mt-2 sm:mt-0">
            {{ __('Postular') }}
        </x-primary-button>
    </form>
</div>
