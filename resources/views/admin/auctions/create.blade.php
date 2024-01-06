<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-600 leading-tight">
            {{ __('Create Auction') }}
        </h2>
    </x-slot>

    <div class="py-6">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">
                    @include('layouts.success-message')
                    @include('layouts.errors-message')

                    <form action="{{ route('auctions.store') }}" method="post" enctype="multipart/form-data">
                        @csrf

                            <label class="block mb-1 text-gray-600" for="issueNo">Issue No:</label>
                            <input type="text" name="issueNo" id="issueNo" class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50" required>


                            <label class="block mb-1 text-gray-600" for="auctionDate">Auction Date:</label>
                            <input type="date" name="auctionDate" id="auctionDate" class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                                required>

                            <label class="block mb-1 text-gray-600" for="cat_id" class="mt-2">Category</label>
                        <select id="cat_id" name="cat_id"
                        class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                            placeholder="Regular input">--}}
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>

                        <button type="submit"
                        class="w-full h-10 px-5 mt-3 text-gray-100 transition-colors duration-200
                        bg-purple-600 rounded-lg focus:shadow-outline hover:bg-purple-700">
                            Create
                        </button>
                    </form>

                </div>
            </div>

    </div>

</x-app-layout>
