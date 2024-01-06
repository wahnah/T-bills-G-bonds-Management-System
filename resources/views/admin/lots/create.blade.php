<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-600 leading-tight">
            Create Security for Auction
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">
                    @include('layouts.errors-message')
                    <form class="flex flex-wrap" method="post" action="{{ route('lots.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        <label class="block mb-1 text-gray-600" for="lot-title">ISIN</label>
                        <input id="lot-title" name="title"
                            class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                            type="text" />

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
                                <option value="{{ $sec_type->id }}">{{ $sec_type->name }}</option>
                            @endforeach
                        </select>

                        <input id="market" name="market"
                            class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                            type="number" value="1" hidden/>

                        <label class="block mb-1 text-gray-600" for="lot-price">Total amount on tender</label>
                        <input id="lot-price" name="price"
                            class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                            type="number" min="0" />

                            <label for="lot-auctionDate" class="mt-2 text-gray-600">Auction Name</label>
                            <select id="lot-auctionDate" name="auctionDate"
                                class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                                placeholder="Regular input">--}}
                                @foreach ($auctions as $auction)
                                    <option value="{{ $auction->id }}">{{ $auction->issueNo }}</option>
                                @endforeach
                            </select>


                            <div id="coupon_rate_dropdown" class="w-full h-10" style="display: none;">
                                <label for="lot-couponRate" class="mt-2 text-gray-600">Coupon Rate</label>
                                <select id="lot-couponRate" name="couponRate" class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50" placeholder="Regular input">
                                    @foreach ($coupons as $coupon)
                                        <option value="{{ $coupon->id }}">{{ $coupon->couponR }}%</option>
                                    @endforeach
                                </select>
                            </div><br><br><br>

                            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#sec_type').change(function() {
                var selectedValue = $(this).val();

                if (selectedValue > 4) {
                    $('#coupon_rate_dropdown').show();
                    $('#lot-auctionDate').empty();

                    @foreach ($auctions as $auction)
                        @if ($auction->cat_id == 2)
                            $('#lot-auctionDate').append('<option value="{{ $auction->id }}">{{ $auction->issueNo }}</option>');
                        @endif
                    @endforeach
                } else {
                    $('#coupon_rate_dropdown').hide();
                    $('#lot-auctionDate').empty();

                    @foreach ($auctions as $auction)
                        @if ($auction->cat_id == 1)
                            $('#lot-auctionDate').append('<option value="{{ $auction->id }}">{{ $auction->issueNo }}</option>');
                        @endif
                    @endforeach
                }
            });
        });
    </script>
                        <!--<label class="block mb-1" for="lot-auctionDate">Auction Date</label>
                        <input id="lot-auctionDate" name="auctionDate"
                            class="w-full h-10 px-3 mb-2 text-base text-gray-700 placeholder-gray-400 border rounded-lg focus:shadow-outline"
                            type="date" />-->



                        <div class="w-full">
                            <input id="sale-lot" name="for_sale"
                                class="form-checkbox h-5 w-5 text-gray-600 focus:ring-transparent" type="checkbox" />
                            <label for="sale-lot" class="inline-flex items-center">Put up for sale</label>
                        </div>
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
