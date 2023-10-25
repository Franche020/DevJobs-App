<div class="md:flex md:justify-center p-5">
    <form action="" class="md:w-1/2 space-y-5">
        {{-- Input Titulo --}}
        <div>
            <x-input-label for="titulo" :value="__('Title')" />
            <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="old('titulo')" 
            required autofocus placeholder="Titulo de la Vacante" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        {{-- Input Salario --}}
        <div class="mt-4">
            <x-input-label for="salario" :value="__('Monthly salary')" />
            <select name="salario" id="salario" required
                            class="border-gray-300 rounded-md shadow-sm w-full
                            dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:ring-indigo-600
                            focus:border-indigo-500 focus:ring-indigo-500 ">
                <option value="" disabled selected>-- Seleccione --</option>
                @foreach ($salarios as $salario)
                    <option value="{{$salario->id}}">{{$salario->salario}}</option>
                @endforeach
         
            </select>
            <x-input-error :messages="$errors->get('rol')" class="mt-2" />
        </div>
        {{-- Input Categoria --}}
        <div class="mt-4">
            <x-input-label for="categoria" :value="__('Category')" />
            <select name="categoria" id="categoria" required
                            class="border-gray-300 rounded-md shadow-sm w-full
                            dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:ring-indigo-600
                            focus:border-indigo-500 focus:ring-indigo-500 ">
         
            </select>
            <x-input-error :messages="$errors->get('rol')" class="mt-2" />
        </div>
        {{-- Input Empresa --}}
        <div>
            <x-input-label for="empresa" :value="__('Company')" />
            <x-text-input id="empresa" class="block mt-1 w-full" type="text" name="empresa" :value="old('empresa')" 
                            required  placeholder="Nombre de la Empresa" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        {{-- Input Ultimo dia --}}
        <div>
            <x-input-label for="ultimo_dia" :value="__('Due date')" />
            <x-text-input id="ultimo_dia" class="block mt-1 w-full" type="date" name="ultimo_dia" :value="old('ultimo_dia')" 
                            required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        {{--  Input Descripcion --}}
        <div>
            <x-input-label for="descripcion" :value="__('Description')" />
            <textarea name="descripcion" id="descripcion" cols="30" rows="10"
                        class="border-gray-300 rounded-md shadow-sm w-full
                        dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 dark:focus:ring-indigo-600
                        focus:border-indigo-500 focus:ring-indigo-500 "></textarea>
        </div>
        {{-- Input Imagen --}}
        <div>
            <x-input-label for="imagen" :value="__('Image')" />
            <x-text-input id="imagen" class="block mt-1 w-full" type="file" name="imagen"  
            required />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <x-primary-button class="mt-2 sm:mt-0">
            {{ __('Create') }}
        </x-primary-button>

    </form>
</div>
