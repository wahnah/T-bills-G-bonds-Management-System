<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Lot Bid Submission') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('layouts.success-message')
                    @include('layouts.errors-message')
                    <div class="flex justify-between mb-3 mr-3">

                       future value: {{$estimatedfValue}}



                    </div>
                </div>
            </div>
        </div>


</x-app-layout>
