<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-600 leading-tight">
            {{ __('Calculator Tools') }}
        </h2>
    </x-slot>
    <!--<div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="mb-4 font-semibold text-lg text-gray-800 leading-tight ">Kwacha-price for Government Bonds
                    </h1>

                    <form method="POST" action="bond">
                        @csrf
                        <label class="block text-gray-700 text-sm font-bold mb-2">Enter Annual Coupon Amount:</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text" name="c" required>
                        <br>
                        <br>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Enter Yield Rate:</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text" name="i" required>
                        <br>
                        <br>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Enter No of Coupon Periods for
                            Bond:</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text" name="n" required>
                        <br>
                        <br>
                        <br>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="submit" value="Calculate">
                    </form>

                    <br>
                    <div class="row">
                        <div class="col-md-4 m-auto">
                            @if (session('p'))
<div class="alert alert-warning">
                                    <h3 class="mb-4 font-semibold text-lg text-gray-800 leading-tight text-center">
                                        {{ session('p') }}</h3>
                                </div>
@endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="mb-4 font-semibold text-lg text-gray-800 leading-tight">Kwacha-price for Treasury Bills
                    </h1>

                    <form method="POST" action="bill">
                        @csrf

                        <label class="block text-gray-700 text-sm font-bold mb-2">Enter Tenor:</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text" name="ii" required>
                        <br>
                        <br>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Enter Yield Rate:</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text" name="nn" required>
                        <br>
                        <br>
                        <br>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="submit" value="Calculate">

                    </form>

                    <br>
                    <div class="row">
                        <div class="col-md-4 m-auto">
                            @if (session('pp'))
<div class="alert alert-warning">
                                    <h3 class="mb-4 font-semibold text-lg text-gray-800 leading-tight text-center">
                                        {{ session('pp') }}</h3>
                                </div>
@endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="mb-4 font-semibold text-lg text-gray-800 leading-tight">Coupon Payment Price for
                        Government bonds</h1>


                    <form method="POST" action="coupon">
                        @csrf
                        <label class="block text-gray-700 text-sm font-bold mb-2">Enter Face Value:</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text" name="fv" required>
                        <br>
                        <br>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Enter Coupon Rate:</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text" name="cr" required>
                        <br>
                        <br>
                        <label class="block text-gray-700 text-sm font-bold mb-2">Enter No of Days in Coupon
                            Period:</label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text" name="nd" required>
                        <br>
                        <br>
                        <br>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="submit" value="Calculate">

                    </form>

                    <br>
                    <div class="row">
                        <div class="col-md-4 m-auto">
                            @if (session('cp'))
<div class="alert alert-warning">
                                    <h3 class="mb-4 font-semibold text-lg text-gray-800 leading-tight text-center">
                                        {{ session('cp') }}</h3>
                                </div>
@endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>-->
    <div class="grid grid-cols-2 gap-6">
        <!-- First column -->
        <div class="col-span-1">
            <div class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class=" overflow-hidden ">

                        <h3 class="mb-4 font-semibold text-lg text-purple-600 leading-tight">Government Bond advisor</h3>

                            <form method="POST" action="advisorBond">
                                @csrf
                                <label class="block mb-1 text-gray-600">Sinario Principle:</label>
                                <input
                                class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                                    type="text" name="principle" required>
                                <br>
                                <br>
                                <label class="block mb-1 text-gray-600">Bond Multiple:</label>
                                <select id="res" name="res"
                                class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                                    placeholder="Regular input">--}}

                                    <option value=1000>Non Competitive</option>
                                    <option value=5000>Competitive</option>

                                </select>
                                <br>
                                <br>
                                <label class="block mb-1 text-gray-600">Duration:</label>
                                <select id="bondduration" name="bondduration"
                                class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                                    onchange="getBondPrices()">
                                    <option value="2">2 years</option>
                                    <option value="3">3 years</option>
                                    <option value="5">5 year</option>
                                    <option value="7">7 year</option>
                                    <option value="10">10 year</option>
                                    <option value="15">15 year</option>
                                </select>
                                <br>
                                <br>
                                <label class="block mb-1 text-gray-600">Bond Price:</label>
                                <select id="bondp" name="bondp"
                                class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                                    placeholder="Regular input"></select>
                                <br>
                                <br>
                                <br>
                                <input
                                class="w-full h-10 px-5 mt-3 text-gray-100 transition-colors duration-200
                                bg-purple-600 rounded-lg focus:shadow-outline hover:bg-purple-700"
                                    type="submit" value="Calculate">
                            </form>
                            <br>
                            <div class="row">
                                <div class="col-md-4 m-auto">
                                    @if (session('sprinciple') && session('bondp') && session('duration'))
    <p class="text-purple-600">For a scenario priciple of ZMK{{ session('sprinciple') }} and an issue price of {{ session('bondp') }}, and a duration of {{ session('duration') }} years. your investment will have a:</p>
@endif
                                    @if (session()->has('futureValue'))
                                        <p>Future Value: ZMK{{ session('futureValue') }}</p>
                                    @endif
                                    @if (session()->has('principle'))
                                        <p>Principle: ZMK{{ session('principle') }}</p>
                                    @endif
                                    @if (session()->has('netCrate'))
                                        <p>Total Coupon Amount: ZMK{{ session('netCrate') }}</p>
                                    @endif
                                    @if (session()->has('semiAnCoup'))
                                        <p>Semi Annual Coupon Amount: ZMK{{ session('semiAnCoup') }}</p>
                                    @endif
                                    @if (session()->has('totalGain'))
                                        <p>Total Expected Gain: ZMK{{ session('totalGain') }}</p>
                                    @endif
                                </div>
                            </div>



                        <script>
                            function getBondPrices() {
                                const durationSelect = document.getElementById('bondduration');
                                const bondpSelect = document.getElementById('bondp');

                                // Make an AJAX request to retrieve bond prices based on the selected duration
                                const xhr = new XMLHttpRequest();
                                xhr.open('GET', '{{ route('getBondPrices') }}?bondduration=' + durationSelect.value);
                                xhr.onload = () => {
                                    // Replace the bondp select element's options with the retrieved HTML options
                                    bondpSelect.innerHTML = xhr.responseText;
                                };
                                xhr.send();
                            }
                        </script>

                    </div>
                </div>
            </div>
        </div>
        <!-- Second column -->
        <div class="col-span-1">
            <div class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class=" overflow-hidden ">

                        <h3 class="mb-4 font-semibold text-lg text-purple-600 leading-tight">Tresuary Bill advisor</h3>

                            <form method="POST" action="advisorBill">
                                @csrf
                                <label class="block mb-1 text-gray-600">Sinario Principle:</label>
                                <input
                                class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                                    type="text" name="principle" required>
                                <br>
                                <br>
                                <label class="block mb-1 text-gray-600">Tenor:</label>
                                <select id="billduration" name="billduration"
                                class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                                    onchange="getBillPrices()">
                                    <option value="91">91 days</option>
                                    <option value="182">182 days</option>
                                    <option value="273">273 days</option>
                                    <option value="364">364 days</option>
                                </select>
                                <br>
                                <br>
                                <label class="block mb-1 text-gray-600">Bill Price:</label>
                                <select id="billp" name="billp"
                                class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                                    placeholder="Regular input"></select>
                                <br>
                                <br>
                                <br>
                                <input
                                class="w-full h-10 px-5 mt-3 text-gray-100 transition-colors duration-200
                                bg-purple-600 rounded-lg focus:shadow-outline hover:bg-purple-700"
                                    type="submit" value="Calculate">
                            </form>
                            <br>
                            <div class="row">
                                <div class="col-md-4 m-auto">
                                    @if (session()->has('estimatedfValue'))
                                        <p class="text-purple-600">For a Tresuary bill worth: ZMK{{ session('tprinciple') }} your :</p>
                                    @endif
                                    @if (session()->has('estimatedfValue'))
                                        <p>Priciple: ZMK{{ session('estimatedfValue') }}</p>
                                    @endif
                                </div>
                            </div>
                            <script>
                                function getBillPrices() {
                                    const durationSelect = document.getElementById('billduration');
                                    const billpSelect = document.getElementById('billp');

                                    // Make an AJAX request to retrieve bond prices based on the selected duration
                                    const xhr = new XMLHttpRequest();
                                    xhr.open('GET', '{{ route('getBillPrices') }}?billduration=' + durationSelect.value);
                                    xhr.onload = () => {
                                        // Replace the bondp select element's options with the retrieved HTML options
                                        billpSelect.innerHTML = xhr.responseText;
                                        //console.log(xhr.responseText);
                                    };

                                    xhr.send();
                                }
                            </script>

                    </div>
                </div>
            </div>

        </div>
      </div>


    </div>


</x-app-layout>
