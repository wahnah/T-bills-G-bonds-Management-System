<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-600 leading-tight">
            {{ __('Expired') }}
        </h2>
    </x-slot>

    <div class="flex justify-center items-center h-screen">
        <div class="py-12 ">

<p class="text-gray-600 text-5xl font-extrabold">The Security ISIN {{$lot->name}} Bidding Period elapased</p>

        </div>
    </div>
</x-app-layout>
