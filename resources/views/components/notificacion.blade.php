@php
    $defaultClasses = 'px-2 py-1 uppercase border border-transparent rounded-full font-semibold bg-gray-600 dark:bg-gray-600 text-white text-xs dark:text-gray-800 tracking-widest hover:bg-indigo-800 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 transition ease-in-out duration-150';
    $activeClasses = 'bg-indigo-600 dark:bg-indigo-400' ;
@endphp

<p {{ $attributes->merge([
      'class' => $defaultClasses
    ])->class([
        $activeClasses => auth()->user()->unreadNotifications->count()])}} 
>{{auth()->user()->unreadNotifications->count()}}

</p>


    




