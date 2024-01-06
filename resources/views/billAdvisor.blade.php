<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-600 leading-tight">
            {{ __('Treasury Bill Bid Form') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @include('layouts.success-message')
                    @include('layouts.errors-message')

                <!--<form method="POST" action="{{route('advisorBill',$lot->id)}}">
                @csrf
                    <label  class="block text-gray-700 text-sm font-bold mb-2">Sinario Principle:</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text" name="principle" required>
                    <br>
                    <br>
                    <label  class="block text-gray-700 text-sm font-bold mb-2">Bill Price:</label>
                    <select id="billp" name="billp"
                                class="w-full h-10 mb-2 mt-1 pl-3 pr-5 placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline" placeholder="Regular input">--}}
                            @foreach($billp as $bill)
                                @if($bill->duration == $lot->sec_type->duration)
                                    <option value="{{$bill->bprice}}">{{$bill->tenderNo}}</option>
                                @endif

                            @endforeach
                        </select>
                    <br>
                    <br>
                    <br>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="submit" value="Calculate">
                </form>-->

                <br>
                <?php
                // Get the value of the selectedAmount parameter from the request
                $selectedAmount = request()->query('selectedAmount');
                ?>

                @if($selectedAmount == 'competitiveTa')
                @include('layouts.bid-form')
            @else
                @include('layouts.bid-form1')
            @endif

                </div>
            </div>
        </div>
    </div>

</x-app-layout>
