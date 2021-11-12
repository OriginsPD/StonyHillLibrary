@props([
    'alpName'
])

<div x-show="{{ $alpName }}"
     x-transition.duration.300ms
    class="fixed h-screen flex items-center justify-center top-0 left-0 z-50 w-screen bg-gray-800 bg-opacity-75">

    {{ $slot }}

</div>
