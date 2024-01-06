<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-600 leading-tight">
            {{ __('All Secondary Market Sells') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">

                <h3 class="mb-4 font-semibold text-lg text-purple-600 leading-tight">List of all secondary purchases
                </h3>
                @include('layouts.success-message')
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        @if($resolds->isNotEmpty())
                      <table class="w-full whitespace-no-wrap">
                        <thead>
                          <tr
                            class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                          >
                                <th class="px-4 py-3">
                                    Security Name
                                </th>
                                <th class="px-4 py-3">
                                    Seller Name
                                </th>
                                <th class="px-4 py-3">
                                    Buyer Name
                                </th>
                                <th class="px-4 py-3">
                                    Category
                                </th>
                                <th class="px-4 py-3">
                                    Price
                                </th>
                                <th class="px-4 py-3">
                                    Transaction Date
                                </th>

                            </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @forelse($resolds as $resold)
                            <tr>
                                <td class="px-4 py-3 text-sm">
                                    <div class="text-sm text-gray-600">
                                        {{ $resold->lot->name }}
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <div class="text-sm text-gray-600">
                                        {{ $resold->seller->name }}
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <div class="text-sm text-gray-600">
                                        {{ $resold->buyer->name }}
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <div class="text-sm text-gray-600">
                                        {{ $resold->category->name }}
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <div class="text-sm text-gray-600">
                                        {{ $resold->price }}
                                    </div>
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <div class="text-sm text-gray-600">
                                        {{ $resold->created_at }}
                                    </div>
                                </td>

                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @else
                        <p>There are no secondary market sells.</p>
                        @endif
                    </div>
                </div>

        </div>
    </div>
</div>

</x-app-layout>
