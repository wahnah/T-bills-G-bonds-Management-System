<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-600 leading-tight">
            {{ __('Prices') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">
                <h3 class="mb-4 font-semibold text-lg text-purple-600 leading-tight">G-Bond Auction Prices
                </h3>
                @include('layouts.success-message')
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                      <table class="w-full whitespace-no-wrap">
                        <thead>
                          <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                          >
                                <th class="px-4 py-3">
                                    Duration
                                </th>
                                <th class="px-4 py-3">
                                    Price
                                </th>
                                <th class="px-4 py-3">Action</th>
                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @forelse($bonds as $bond)
                            <tr>
                                <td class="px-4 py-3 text-sm">
                                    <div class="text-sm text-gray-600">
                                        {{ $bond->duration }}
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <div class="text-sm text-gray-600">{{ $bond->bprice }}</div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <a
                                        href="{{route('admin.prices.edit', $bond->id)}}"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
            <svg
            class="w-5 h-5"
            aria-hidden="true"
            fill="currentColor"
            viewBox="0 0 20 20"
          >
            <path
              d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
            ></path>
          </svg>
                                    </a>
                                </td>
                            </tr>
                            @empty
                                There are no bonds.
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>


<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class=" overflow-hidden ">
                <h3 class="mb-4 font-semibold text-lg text-purple-600 leading-tight">T-Bill Auction Prices
                </h3>
                @include('layouts.success-message')
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                      <table class="w-full whitespace-no-wrap">
                        <thead>
                          <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                          >
                                    <th class="px-4 py-3">
                                        Duration
                                    </th>
                                    <th class="px-4 py-3">
                                        Price
                                    </th>
                                    <th class="px-4 py-3"> Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($bills as $bill)
                            <tr>
                                <td class="px-4 py-3 text-sm">
                                    <div class="text-sm text-gray-600">
                                        {{ $bill->duration }}
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <div class="text-sm text-gray-600">{{ $bill->bprice }}</div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <a
                                        href="{{route('admin.prices.edit1', $bill->id)}}"
                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
            <svg
            class="w-5 h-5"
            aria-hidden="true"
            fill="currentColor"
            viewBox="0 0 20 20"
          >
            <path
              d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"
            ></path>
          </svg>
                                    </a>
                                </td>
                            </tr>
                            @empty
                                There are no bills.
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>

</x-app-layout>
