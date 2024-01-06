<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit lot: {{$lot->name}}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('layouts.errors-message')
                    <form class="flex flex-wrap flex-col mb-5" method="post" enctype="multipart/form-data"
                          action="{{route('lots.update', $lot->id)}}">
                        @csrf
                        @method('PATCH')
                        <label class="block mb-1" for="lot-title">Lot name</label>
                        <input
                            id="lot-title"
                            name="title"
                            class="w-full h-10 px-3 mb-2 text-base text-gray-700 border rounded-lg focus:shadow-outline"
                            type="text"
                            value="{{ $lot->name }}"/>
                            <label for="description" class="mt-2 text-gray-600">Description</label>
                            <select id="description" name="description"
                                class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                                placeholder="Regular input">--}}

                                    <option value="New Issue">New Issue</option>
                                    <option value="Re-Issue">Re-Issue</option>

                            </select>

                            <label for="sec_type" class="mt-2 text-gray-600">Security Type</label>
                            <select id="sec_type" name="sec_type"
                                class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                                placeholder="Regular input">--}}
                                @foreach ($sec_types as $sec_type)
                                    <option value="{{ $sec_type->id }}"
                                        @if($sec_type->id === $lot->sec_type_id)
                                                selected
                                            @endif>{{ $sec_type->name }}</option>
                                @endforeach
                            </select>
                        <label for="category" class="mt-2">Select category</label>
                        <select id="category" name="category"
                                class="w-full h-10 mb-2 mt-1 pl-3 pr-5 placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline" placeholder="Regular input">--}}
                            @foreach($categories as $category)
                                <option value="{{$category->id}}"
                                    @if($category->id === $lot->category->id)
                                        selected
                                    @endif>{{$category->name}}</option>
                            @endforeach
                        </select>
                        <label for="market" class="mt-2">Select Market</label>
                        <select id="market" name="market"
                                class="w-full h-10 mb-2 mt-1 pl-3 pr-5 placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline" placeholder="Regular input">--}}
                            @foreach($markets as $market)
                                <option value="{{$market->id}}"
                                    @if($market->id === $lot->market_id)
                                        selected
                                    @endif>{{$market->name}}</option>
                            @endforeach
                        </select>
                        <label class="block mb-1" for="lot-price">Start price</label>
                        <input
                            id="lot-price"
                            name="price"
                            class="w-full h-10 px-3 mb-2 text-base text-gray-700 placeholder-gray-400 border rounded-lg focus:shadow-outline"
                            type="number"
                            min="0"
                            value="{{ $lot->start_price }}"/>

                            <label for="lot-auctionDate" class="mt-2 text-gray-600">Auction Name</label>
                        <select id="lot-auctionDate" name="auctionDate"
                            class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                            placeholder="Regular input">--}}
                            @foreach ($auctions as $auction)
                                <option value="{{ $auction->id }}">{{ $auction->issueNo }}</option>
                            @endforeach
                        </select>

                        <div class="w-full">
                            <input
                                id="sale-lot"
                                name="for_sale"
                                class="form-checkbox h-5 w-5 text-gray-600 focus:ring-transparent"
                                type="checkbox"
                                @if($lot->status === 'On sale')
                                    checked
                                @endif
                            />
                            <label for="sale-lot" class="inline-flex items-center">Put up for sale</label>
                        </div>
                        <button
                            type="submit"
                            class="h-10 w-24 px-5 mt-3 text-gray-100 transition-colors duration-200
                bg-yellow-500 rounded-lg focus:shadow-outline hover:bg-yellow-600">
                            Update
                        </button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" overflow-hidden ">
                @include('layouts.errors-message')
                <form class="flex flex-wrap" method="get" action="{{route('lots.update', $lot->id)}}"
                    enctype="multipart/form-data">
                    @csrf
                    <label class="block mb-1 text-gray-600" for="lot-title">ISIN</label>
                    <input id="lot-title" name="title"
                        class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                        type="text"
                        value="{{ $lot->name }}" />

                    <label for="description" class="mt-2 text-gray-600">Description</label>
                    <select id="description" name="description"
                        class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                        placeholder="Regular input">--}}

                            <option value="New Issue">New Issue</option>
                            <option value="Re-Issue">Re-Issue</option>

                    </select>

                    <label for="sec_type" class="mt-2 text-gray-600">Security Type</label>
                    <select id="sec_type" name="sec_type"
                        class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                        placeholder="Regular input">--}}
                        @foreach ($sec_types as $sec_type)
                            <option value="{{ $sec_type->id }}"
                                @if($sec_type->id === $lot->sec_type_id)
                                        selected
                                    @endif>{{ $sec_type->name }}</option>
                        @endforeach
                    </select>
                    <label for="market" class="mt-2 text-gray-600">Market</label>
                    <select id="market" name="market"
                        class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                        placeholder="Regular input">--}}
                        @foreach($markets as $market)
                                <option value="{{$market->id}}"
                                    @if($market->id === $lot->market_id)
                                        selected
                                    @endif>{{$market->name}}</option>
                            @endforeach
                    </select>
                    <label class="block mb-1 text-gray-600" for="lot-price">Total amount on tender</label>
                    <input id="lot-price" name="price"
                        class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                        type="number" value="{{ $lot->start_price }}"/>


                        <div id="coupon_rate_dropdown" class="w-full h-10" style="display: none;">
                            <label for="lot-couponRate" class="mt-2 text-gray-600">Coupon Rate</label>
                            <select id="lot-couponRate" name="couponRate" class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50" placeholder="Regular input">
                                @foreach ($coupons as $coupon)
                                    <option value="{{ $coupon->id }}"@if($coupon->id === $lot->coupon_id)
                                        selected
                                    @endif>{{ $coupon->couponR }}%</option>
                                @endforeach
                            </select>
                        </div><br>

                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function() {
    $('#sec_type').change(function() {
        var selectedValue = $(this).val();

        if (selectedValue > 4) {
            $('#coupon_rate_dropdown').show();
        } else {
            $('#coupon_rate_dropdown').hide();
        }
    });
});
</script>
                    <!--<label class="block mb-1" for="lot-auctionDate">Auction Date</label>
                    <input id="lot-auctionDate" name="auctionDate"
                        class="w-full h-10 px-3 mb-2 text-base text-gray-700 placeholder-gray-400 border rounded-lg focus:shadow-outline"
                        type="date" />-->

                    <label for="lot-auctionDate" class="mt-2 text-gray-600">Auction Name</label>
                        <select id="lot-auctionDate" name="auctionDate"
                            class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                            placeholder="Regular input">--}}
                            @foreach ($auctions as $auction)
                                <option value="{{ $auction->id }}">{{ $auction->issueNo }}</option>
                            @endforeach
                        </select>

                    <div class="w-full">
                        <input id="sale-lot" name="for_sale"
                            class="form-checkbox h-5 w-5 text-gray-600 focus:ring-transparent" type="checkbox" />
                        <label for="sale-lot" class="inline-flex items-center">Put up for sale</label>
                    </div>
                    <button type="submit"
                        class="w-full h-10 px-5 mt-3 text-gray-100 transition-colors duration-200
    bg-purple-600 rounded-lg focus:shadow-outline hover:bg-purple-700">
                        Update
                    </button>
                </form>

        </div>
    </div>
</div>
