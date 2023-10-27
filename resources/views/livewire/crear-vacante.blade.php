<div class="md:flex md:justify-center p-5">
    <form action="" class="md:w-1/2 space-y-5"  wire:submit.prevent='save'>
        {{-- Input Titulo --}}
        <div>
            <x-input-label for="titulo" :value="__('Title')" />
            <x-text-input id="titulo" class="block mt-1 w-full" type="text" wire:model.live="titulo" :value="old('titulo')" 
            autofocus placeholder="Titulo de la Vacante" />
            @error('titulo') <livewire:mostrar-alerta :message="$message"/> @enderror
        </div>
        {{-- Input Salario --}}
        <div class="mt-4">
            <x-input-label for="salario" :value="__('Monthly salary')" />
            <select wire:model.live="salario" id="salario" 
                            class="border-gray-300 rounded-md shadow-sm w-full
                            dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:ring-indigo-600
                            focus:border-indigo-500 focus:ring-indigo-500 ">
                            
                <option value="" selected disabled >-- Seleccione --</option>
                @foreach ($salarios as $salario)
                    <option value="{{$salario->id}}">{{$salario->salario}}</option>
                @endforeach
            </select>
            @error('salario') <livewire:mostrar-alerta :message="$message"/> @enderror
        </div>
        {{-- Input Categoria --}}
        <div class="mt-4">
            <x-input-label for="categoria" :value="__('Category')" />
            <select wire:model.live="categoria" id="categoria"
                            class="border-gray-300 rounded-md shadow-sm w-full
                            dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:ring-indigo-600
                            focus:border-indigo-500 focus:ring-indigo-500 ">
                            
                    <option value="" selected disabled >-- Seleccione --</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{$categoria->id}}">{{$categoria->categoria}}</option>
                    @endforeach
            </select>
            @error('categoria') <livewire:mostrar-alerta :message="$message"/> @enderror
        </div>
        {{-- Input Empresa --}}
        <div>
            <x-input-label for="empresa" :value="__('Company')" />
            <x-text-input id="empresa" class="block mt-1 w-full" type="text" wire:model.live="empresa" :value="old('empresa')" 
                            placeholder="Nombre de la Empresa" />
            @error('empresa') <livewire:mostrar-alerta :message="$message"/> @enderror
        </div>
        {{-- Input Ultimo dia --}}
        <div>
            <x-input-label for="ultimo_dia" :value="__('Due date')" />
            <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" wire:model.live="ultimo_dia" :value="old('ultimo_dia')" 
                            />
            @error('ultimo_dia') <livewire:mostrar-alerta :message="$message"/> @enderror
        </div>
        {{--  Input Descripcion --}}
        <div>
            <x-input-label for="descripcion" :value="__('Description')" />
            <textarea wire:model.live="descripcion" id="descripcion" cols="30" rows="10"
                        class="border-gray-300 rounded-md shadow-sm w-full
                        dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:ring-indigo-600
                        focus:border-indigo-500 focus:ring-indigo-500 "></textarea>
            @error('descripcion') <livewire:mostrar-alerta :message="$message"/> @enderror
        </div>
        {{-- Input Imagen --}}
        <div>
            <x-input-label for="imagen" :value="__('Image')" />
            <x-text-input id="imagen" class="block mt-1 w-full" type="file" wire:model="imagen"  
                        accept="image/*"/>
            <div class="w-full my-5 flex justify-center">
                @if ($imagen)
                <img src="{{ $imagen->temporaryUrl() }}">
            @endif
            </div>
            @error('imagen') <livewire:mostrar-alerta :message="$message"/> @enderror
        </div>
        <x-primary-button class="mt-2 sm:mt-0">
            {{ __('Create') }}
        </x-primary-button>

    </form>
</div>
