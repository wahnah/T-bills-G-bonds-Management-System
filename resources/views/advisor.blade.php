<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-600 leading-tight">
            {{ __('Government Bond Tender Bid') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">

                    @include('layouts.success-message')
                    @include('layouts.errors-message')

                <!--<form method="POST" action="{{route('advisor',$lot->id)}}">
                @csrf
                    <label  class="block text-gray-700 text-sm font-bold mb-2">Sinario Principle:</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text" name="principle" required>
                    <br>
                    <br>
                    <label  class="block text-gray-700 text-sm font-bold mb-2">Bond Multiple:</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="number" name="bondmultiple" value={{ $result }} readonly>
                    <br>
                    <br>
                    <label  class="block text-gray-700 text-sm font-bold mb-2">Bond Price:</label>
                    <select id="bondp" name="bondp"
                                class="w-full h-10 mb-2 mt-1 pl-3 pr-5 placeholder-gray-600 border rounded-lg appearance-none focus:shadow-outline" placeholder="Regular input">--}}
                            @foreach($bondp as $bond)
                                @if($bond->duration == $lot->sec_type->duration/365)
                                    <option value="{{$bond->bprice}}">{{$bond->tenderNo}}</option>
                                @endif

                            @endforeach
                        </select>
                    <br>
                    <br>
                    <br>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="submit" value="Calculate">
                </form>-->
                <?php
                // Get the value of the selectedAmount parameter from the request
                $selectedAmount = request()->query('selectedAmount');
                ?>

                <br>
                @if($selectedAmount == 'competitiveTa')
                @include('layouts.bid-form')
            @else
                @include('layouts.bid-form1')
            @endif

            </div>
        </div>
    </div>

</x-app-layout>
