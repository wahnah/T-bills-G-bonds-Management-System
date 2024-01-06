<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-600 leading-tight">
            Sell This Security
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">

                    @include('layouts.errors-message')

                    @if ($purchase->lot->category->id == 2)
                    <p class="mt-2 text-gray-600"> If {{$noCoupons}} coupon payments have been received, the estimated resell price for this bond is ZMK
                    {{ $estimatedPrice ?? '' }}</p>
                    @endif
                    <form class="flex flex-wrap" method="post" action="{{route('lots.storeResell')}}" enctype="multipart/form-data">
                        @csrf
                        <input
                            id="lot"
                            name="lot"
                            class="w-full h-10 px-3 mb-2 text-base text-gray-700 placeholder-gray-400 border rounded-lg focus:shadow-outline"
                            type="hidden"
                            value="{{ $lot->id }}"
                            readonly/>
                            <input
                            id="purchase"
                            name="purchase"
                            class="w-full h-10 px-3 mb-2 text-base text-gray-700 placeholder-gray-400 border rounded-lg focus:shadow-outline"
                            type="hidden"
                            value="{{ $purchase->id }}"
                            readonly/>
                            <input
                                id="user"
                                name="user"
                                class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 placeholder-gray-400 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                                type="hidden"
                                value="{{ $user }}"
                                readonly />
                                <label class="mt-2 text-gray-600" for="price">price</label>
                                    <input
                                        id="price"
                                        name="price"
                                        class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 placeholder-gray-400 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                                        type="number"
                                        />
                                <label class="mt-2 text-gray-600" for="fval">face Value</label>
                                <input
                                    id="fval"
                                    name="fval"
                                    class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 placeholder-gray-400 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                                    type="text"
                                    value="{{ $value }}"
                                    readonly />

                                    @if ($purchase->lot->category->id == 2)
                                        <label class="mt-2 text-gray-600" for="tcoup">toal coupon value</label>
                                        <input
                                            id="tcoup"
                                            name="tcoup"
                                            class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 placeholder-gray-400 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                                            type="text"
                                            value="{{ $totalC }}"
                                            readonly />
                                            @endif
                                            <label class="mt-2 text-gray-600" for="maturity">maturity date</label>
                                            <input
                                                id="maturity"
                                                name="maturity"
                                                class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 placeholder-gray-400 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                                                type="text"
                                                value="{{ $maturity }}"
                                                readonly />
                        <button
                            type="submit"
                            class="w-full h-10 px-5 mt-3 text-gray-100 transition-colors duration-200
        bg-purple-600 rounded-lg focus:shadow-outline hover:bg-purple-700">
                            Sale
                        </button>
                    </form>

            </div>
        </div>
    </div>

</x-app-layout>
