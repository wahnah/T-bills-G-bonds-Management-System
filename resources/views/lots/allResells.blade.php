<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-600 leading-tight">
            <span class="tooltip">
            All Your Resells
            </span>
        </h2>
        <style>
            .tooltip {
                position: relative;
            }
            .tooltip:hover::after {
                content: "This page shows all the securities you own that youve opted to resell";

                color: #9333ea;
                padding: 4px 8px;
                border-radius: 4px;
                position: absolute;
                top: 170%;
                left: 30%;
                right: 5%;
                transform: translateX(-50%);
                white-space: nowrap;
            }
        </style>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">

                @include('layouts.success-message')


                <div class="grid lg:grid-cols-3 sm:grid-cols-3 gap-4">


                    @if ($resells->isNotEmpty())
                        @foreach ($resells as $resell)
                            <a class="flex items-center justify-center rounded-lg bg-white border"
                                href="{{ route('lots.resellShow', $resell->id) }}">
                                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">


                                    <div class="mt-4 mb-4 flex flex-col ml-2">
                                        <div class="flex mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                            <strong>ISIN</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $resell->lot->name }}
                                        </div>
                                        <div class="flex mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                            <strong>Seller</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $resell->seller->name }}
                                        </div>
                                        <div class="flex mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                            <strong>Security Type</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            {{ $resell->category->name }}
                                        </div>
                                        <div class="flex mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                            <strong>Price</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ZMK {{ $resell->price }}
                                        </div>
                                        <div class="flex mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                            <strong>Maturity Date</strong>&nbsp;&nbsp;&nbsp;&nbsp; :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            {{ $resell->maturityDate }}
                                        </div>
                                    </div>


                                </div>
                            </a>
                        @endforeach

                        <div>{{ $resells->links() }}</div>
                </div>
            @else
                <p>You have not uploaded any resell.</p>
                @endif
            </div>
            <br>







        </div>
    </div>


</x-app-layout>
