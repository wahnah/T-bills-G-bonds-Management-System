<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Secondary Market Bid Form') }}
        </h2>
    </x-slot>
<br>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">

                    @include('layouts.success-message')
                    @include('layouts.errors-message')

                    @include('layouts.sec-bid-form')


            </div>
        </div>
    </div>
    <br>
    <br>

</x-app-layout>
