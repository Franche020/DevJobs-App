@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm dark:bg-red-600 dark:text-gray-200 py-1 space-y-1 bg-red-100 text-red-600 border-l-4 border-red-600 dark:border-red-100']) }}>
        @foreach ((array) $messages as $message)
            <li class="pl-2">{{ $message }}</li>
        @endforeach
    </ul>
@endif
