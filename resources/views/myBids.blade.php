<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-600 leading-tight">
            {{ __('My Active Bids') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">
                <div class="p-6 border-b border-gray-200">
                    @include('layouts.success-message')
                    @include('layouts.errors-message')


                            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                                <div class="w-full overflow-x-auto">
                                  <table class="w-full whitespace-no-wrap">
                                    <thead>
                                      <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800"
                                      >
                                                <th
                                                class="px-4 py-3">
                                                    Security
                                                </th>

                                                <th
                                                class="px-4 py-3">
                                                    Premium
                                                </th>
                                                <th
                                                class="px-4 py-3">
                                                    Category
                                                </th>
                                                <th
                                                class="px-4 py-3">
                                                    Bid-type
                                                </th>
                                                <th
                                                class="px-4 py-3">
                                                    Duration
                                                </th>
                                                <th
                                                class="px-4 py-3">
                                                    Action
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                            @foreach ($tbids as $tbid)
                                            <tr>
                                                <td class="px-4 py-3 text-sm">
                                                    {{ $tbid->lot->name }}
                                                </td>
                                                <td class="px-4 py-3 text-sm">
                                                    ZMK {{ $tbid->premium }}
                                                </td>
                                                <td class="px-4 py-3 text-sm">
                                                    <div class="text-sm text-gray-900">
                                                        @if($tbid->cat_id == 1)
                                                            Treasury bill
                                                        @else
                                                            Government bond
                                                        @endif
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 text-sm">

                                                    <div class="text-sm text-gray-900">
                                                        @if($tbid->bidtype == "noncompetitiveTa")
                                                            Noncompetitive
                                                        @else
                                                            Competitive
                                                        @endif
                                                    </div>
                                                </td>
                                                <td class="px-4 py-3 text-sm">
                                                    {{ $tbid->duration }}
                                                </td>

                                                <td class="px-4 py-3 text-sm">
                                                <a href="{{ route('deleteBid', $tbid->id) }}" >delete</a>
                                            </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                </div>



            </div>
        </div>
    </div>

</x-app-layout>
