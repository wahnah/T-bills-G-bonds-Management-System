<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-600 leading-tight">
            {{ __('All Auctions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">
                    @include('layouts.success-message')
                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                          <table class="w-full whitespace-no-wrap">
                            <thead>
                              <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                              >
                                        <th class="px-4 py-3">
                                            Issue Number
                                        </th>
                                        <th class="px-4 py-3">
                                            Auction Date
                                        </th>
                                        <th class="px-4 py-3">
                                            Category
                                        </th>
                                        <th class="px-4 py-3">Action</th>
                                       <!-- <th class="px-4 py-3">Delete</th>-->
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                    @forelse($auctions as $auction)
                                        <tr>
                                            <td class="px-4 py-3 text-sm">
                                                <div class="text-sm text-gray-600">
                                                    {{ $auction->issueNo }}
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <div class="text-sm text-gray-600">
                                                    {{ $auction->auctionDate }}
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <div class="text-sm text-gray-600">
                                                    @if($auction->cat_id == 1)
                                                        Treasury bill
                                                    @else
                                                        Government bond
                                                    @endif
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-sm text-purple-600">
                                                <a href="{{ route('auction.show', $auction->id) }}">View</a>
                                            </td>
                                            <!--<td class="px-4 py-3 text-sm">
                                                <a href="{{ route('auction.destroy', $auction->id) }}">Delete</a>
                                            </td>-->
                                        </tr>
                                    @empty
                                        There are no auctions.
                                    @endforelse
                                </tbody>
                            </table>
                        </div>

                        <br />
                        <a href="auctions/create"
                        class="text-center px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple"
                            style="display: block; margin: 0 auto;">
                            Set new auction date
                        </a>


                    </div>
            </div>
        </div>
    </div>

</x-app-layout>
