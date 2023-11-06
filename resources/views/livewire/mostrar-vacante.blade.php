<div>
    <div class="mb-5">
        <h3 class="my-3 text-3xl font-bold">{{ $vacante->titulo }}</h3>
        <div class="my-10 rounded-md bg-gray-100 p-4 dark:bg-gray-700 md:grid md:grid-cols-2 md:gap-4">
            <p class="text-sm text-gray-700 dark:text-gray-300">Empresa: <span
                    class="font-bold uppercase">{{ $vacante->empresa }}</span></p>
            <p class="text-sm text-gray-700 dark:text-gray-300">Último día: <span
                    class="font-bold uppercase">{{ $vacante->ultimo_dia->isoformat('DD/MM/YYYY') }}</span></p>
            <p class="text-sm text-gray-700 dark:text-gray-300">Categoría: <span
                    class="font-bold uppercase">{{ $vacante->categoria->categoria }}</span></p>
            <p class="text-sm text-gray-700 dark:text-gray-300">Salario: <span
                    class="font-bold uppercase">{{ $vacante->salario->salario }}</span></p>

        </div>
    </div>
    <div class="gap-4 md:grid md:grid-cols-6">
        <div class="md:col-span-2">
            <a href="{{ asset('storage/vacantes/' . $vacante->imagen) }}">
                <img class="rounded-md" src="{{ asset('storage/vacantes/' . $vacante->imagen) }}"
                    alt="Imagen de la vacante {{ $vacante->titulo }}">
            </a>
        </div>
        <div class="md:col-span-4">
            <h2 class="mb-2 text-2xl font-bold">Descripcion del puesto</h2>
            <p>{{ $vacante->descripcion }}</p>
        </div>
    </div>
    @guest
        <div class="mt-5 rounded-md border border-dashed bg-gray-50 p-5 text-center dark:border-gray-500 dark:bg-gray-700">
            <p>¿Deseas aplicara esta Vacante? <a href="{{ route('register') }}"
                    class="font-bold text-indigo-500 dark:text-indigo-400">Obten una cuenta y aplica a estas y otras
                    vacantes</a></p>
        </div>
    @endguest
    @auth
        @cannot('create', App\Models\Vacante::class)
            @if (!$devAplicado)
                <livewire:postular-vacante :vacante="$vacante" />
            @else
                <p class="my-2">Ya has aplicado a esta vacante, Gracias</p>
            @endif
        @endcannot
    @endauth
</div>
