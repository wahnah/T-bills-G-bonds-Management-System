<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-600 leading-tight">
            {{ __('Upcoming Auctions') }}
        </h2>
    </x-slot>

      <div class="grid lg:grid-cols-2 sm:grid-cols-2 gap-2">
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">

                <h3 class="mb-4 font-semibold text-lg text-purple-600 leading-tight">Treasury Bill Auctions</h3>
                    <br>
                    @if($auctions->isNotEmpty())
                        <div class="container mx-auto">
                            @include('layouts.success-message')

                                @foreach($auctions as $auction)
                                <a class="flex items-center justify-center rounded-lg bg-white border" href="{{route('auction.show', $auction->id)}}" class="flex items-center justify-center bg-white bg-opacity-80   h-44">
                                    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                        <div class="mt-4 mb-4 flex flex-col ml-2">

                                            <div class="flex mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                                <strong>Issue Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $auction->issueNo }}
                                            </div>
                                            <br>
                                            <div class="flex mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"><strong>Auction Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $auction->auctionDate }}</div>
                                        </div>
                                    </div>
                                    </a>
<br>
                                @endforeach

                        </div>
                    @else
                        <p>You have no upcoming auctions.</p>
                    @endif

            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">

                <h3 class="mb-4 font-semibold text-lg text-purple-600 leading-tight">Government Bond Auctions</h3>
                    <br>
                    @if($auctionz->isNotEmpty())
                        <div class="container mx-auto">
                            @include('layouts.success-message')

                                @foreach($auctionz as $auction)

                                <a class="flex items-center justify-center rounded-lg bg-white border"  href="{{route('auction.show', $auction->id)}}" class="flex items-center justify-center bg-white  h-44">
                                    <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                                    <div class="mt-4 mb-4 flex flex-col ml-2">
                                    <div class="flex mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                        <strong>Issue Number&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $auction->issueNo }}
                                    </div>
                                    <br>
                                    <div class="flex mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"><strong>Auction Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $auction->auctionDate }}</div>
                                </div>
                                    </div>
                            </a>
<br>
                                @endforeach

                        </div>
                    @else
                        <p>You have no upcoming auctions.</p>
                    @endif

            </div>
        </div>
    </div>
      </div>




</x-app-layout>
