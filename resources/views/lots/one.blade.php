<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-purple-600 leading-tight">
            {{ $lot->name }}
        </h1>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('layouts.success-message')
                    @include('layouts.errors-message')
                    <div class="flex justify-between mb-3 mr-3">
                        <!--<lot-status-badge class="px-2 py-1 text-xs h-5 font-bold leading-none rounded-full"
                                    status="{{ $lot->status }}"></lot-status-badge>-->
                        <!--<div class="text-green-500 text-5xl">
                            <new-bid :lot="{{ $lot->id }}" :bid="{{ $lot->start_price }}"></new-bid>
                        </div>-->
                    </div>
                    <div class="flex justify-between items-center mb-7 mr-3">
                        <div>

                            <div class="flex">

                                {{ $lot->category->name }}
                            </div>
                        </div>

                    </div>
                    <div class="flex">{{ $lot->description }}</div>

                    <br>
                    <br>

                    @if($lot->user_id === Auth::id())
                        <div class="flex">
                            <a
                                href="{{ route('lots.edit', $lot->id) }}"
                                type="submit"
                                class="text-center w-full px-5 py-3 mt-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" style="display: block; margin: 0 auto;">
                                Edit
                            </a>
                        </div>
                            <div class="flex">
                            <form action="{{ route('lots.destroy', $lot->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="w-full h-10 px-5 mt-3 text-gray-100 transition-colors duration-200
                                bg-purple-600 rounded-lg focus:shadow-outline hover:bg-purple-700"
                                        type="submit">Delete
                                </button>
                            </form>
                        </div>
                    @elseif (isset($purchase))
                    <div class="flex">
                        @if ($purchase->lot->category->id == 2)
                            <a href="{{ route('lots.estimateBondPrice', $lot->id) }}" class="text-center w-full px-10 py-3 mt-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" style="display: block; margin: 0 auto;">
                                Resell
                            </a>
                        @else
                            <a href="{{ route('lots.resell', $lot->id) }}" class="text-center w-full px-10 py-3 mt-3 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" style="display: block; margin: 0 auto;">
                                Resell
                            </a>
                        @endif
                    </div>
                    @elseif($lot->status === 'On sale')
                        <div class="mt-5">
                            @include('layouts.select-bid-type')
                        </div>
                    @endif

            </div>
        </div>
    </div>
<br>
<br>

</x-app-layout>
