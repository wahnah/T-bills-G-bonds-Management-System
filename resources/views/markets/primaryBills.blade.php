<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-600 leading-tight">
            {{ __('Primary Market Bills') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">

                    <div class="grid lg:grid-cols-3 sm:grid-cols-2 gap-4">
                        @if ($lots->isNotEmpty())
                            @foreach ($lots as $lot)


                            <a class="flex items-center justify-center rounded-lg bg-white border" href="{{ route('lots.show', $lot->id) }}">


                                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">


                                    <div class="mt-4 mb-4 flex flex-col ml-2">
                                            <div class="flex mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                            <strong>ISIN&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{ $lot->name }}
                                            </div>
                                            <div class="flex mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                                <strong>Tenor&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $lot->sec_type->duration > 365 ? ($lot->sec_type->duration / 365). ' years' : $lot->sec_type->duration. ' days' }}
                                            </div>
                                            <div class="flex mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                                <strong>Competitive&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ZMK {{ $lot->competitiveTa }}
                                            </div>
                                            <div class="flex mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                                <strong>Non-competitive&nbsp;&nbsp; : </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ZMK {{ $lot->noncompetitiveTa }}
                                            </div>
                                            <div class="flex mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                                <strong>Total&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; ZMK {{ $lot->noncompetitiveTa + $lot->competitiveTa }}
                                            </div>
                                            <div class="flex mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                                <strong>Description&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $lot->short_description }}
                                            </div>
                                            <div class="flex mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                                <strong>Seller&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $lot->user->name }}
                                            </div>
                                            <div class="flex mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                                <strong>Security Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : </strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {{ $lot->category->name }}
                                            </div>
                                            <div class="flex mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">
                                                <bid-countdown-timer :sale-timestamp="{{ $lot->sale_timestamp }}">
                                                </bid-countdown-timer>
                                            </div>
                                        </div>
                                </div>
                                    </a>

                            @endforeach
                    </div>
                            <div>{{$lots->links()}}</div>
                        </div>
                    @else
                        <p class="text-gray-600">There are no Treasury Bill up for auction on the primary market.</p>
                    @endif

            </div>
        </div>
    </div>
    <br>
    <br>


</x-app-layout>
