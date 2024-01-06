<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-600 leading-tight">
            {{ __('Edit T-Bill Prices') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">
                    @include('layouts.errors-message')
                    <form action="{{ route('admin.prices.bill1', $bill->id) }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <label class="block mb-1 text-gray-600" for="duration">Duration</label>
                        <input
                            id="duration"
                            name="duration"
                            class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                            type="number"
                            value="{{ $bill->duration }}" readonly/>
                        <label class="block mb-1 text-gray-600" for="bprice">Price</label>
                        <input
                            id="bprice"
                            name="bprice"
                            class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                            type="numeric"
                            value="{{ $bill->bprice }}"/>
                        <button type="submit" class="w-full h-10 px-5 mt-3 text-gray-100 transition-colors duration-200
                        bg-purple-600 rounded-lg focus:shadow-outline hover:bg-purple-700">Submit</button>
                    </form>
                </div>
            </div>

    </div>
</x-app-layout>
