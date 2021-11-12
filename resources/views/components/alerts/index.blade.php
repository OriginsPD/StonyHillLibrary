@props([
    'message' => false,
    'alpName' => false,
    'status' => false
])

@php

    $theme = ($status ?? false) ? 'bg-red-500' : 'bg-white'

@endphp

<div x-data="{ {{ $alpName }}: false }"
     x-on:show-alert.window="{{ $alpName }} = true; setTimeout(() => { {{ $alpName }} = false },2500)"
    class="w-full text-white {{ $theme }}">

    <div x-show="{{ $alpName}}"
         x-transition.enter.origin.top.duration.300ms
         x-transition.out.origin.bottom.duration.300ms
        class="container flex items-center justify-between px-4 py-2 mx-auto">

        <div class="flex">

            @if($status)

                <i class="fas fa-exclamation-triangle text-red-900 mt-0.5"></i>

            @else

                <i class="fas fa-shield-check text-green-900 mt-0.5"></i>

            @endif

            <p class="mx-3 {{ ($theme) ? 'text-green-900' : 'text-red-900' }} my-auto">{{ $message }}</p>

        </div>

        {{ $slot }}

    </div>

</div>
