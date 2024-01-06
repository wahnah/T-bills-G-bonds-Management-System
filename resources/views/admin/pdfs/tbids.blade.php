<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-600 leading-tight">
            {{ __('Temporal Bids') }}
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
                                                    Lot
                                                </th>
                                                <th
                                                class="px-4 py-3">
                                                    Bidder
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
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                            @foreach ($tbids as $tbid)
                                            <tr>
                                                <td class="px-4 py-3 text-sm">
                                                    {{ $tbid->lot->name }}
                                                </td>
                                                <td class="px-4 py-3 text-sm">
                                                    {{ $tbid->user->name }}
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
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                <br>
                <a href="{{ route('admin.pdfs.generatePdf') }}" class="text-center px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" style="display: block; margin: 0 auto;">
                    Generate Pdf Application Forms
                </a>
                <br>
                <a href="{{ route('admin.pdfs.letter') }}" class="text-center px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" style="display: block; margin: 0 auto;">
                    Generate letters of gurantee
                </a>
                <br>
                <a href="{{ route('run-populate-bids') }}" class="text-center px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" style="display: block; margin: 0 auto;">
                    Populate bids table
                </a>
                <br>
                <a href="{{ route('run-sell-lots') }}" class="text-center px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" style="display: block; margin: 0 auto;">
                    Process bids
                </a>

                </div>



            </div>
        </div>
    </div>



</x-app-layout>
