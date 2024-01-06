<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-600 leading-tight">
            {{ __('Primary Market') }}
        </h2>
    </x-slot>

   <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
              <div class="container mx-auto">
                @include('layouts.errors-message')

                <div class="grid lg:grid-cols-2 sm:grid-cols-2 gap-4">
                  <div class="flex justify-center items-center m-5 p-3 rounded-md shadow-md w-44 h-44">
                    <a href="{{ route('markets.primaryBonds') }}" class="card border-dark">
                      <div class="card-body text-dark font-bold text-center">
                        <h5 class="card-title">Bonds</h5>
                      </div>
                    </a>
                  </div>

                  <div class="flex justify-center items-center m-5 p-3 rounded-md shadow-md w-44 h-44">
                    <a href="{{ route('markets.primaryBills') }}" class="card border-dark">
                      <div class="card-body text-dark font-bold text-center">
                        <h5 class="card-title">Bills</h5>
                      </div>
                    </a>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>-->
      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">

                    @include('layouts.success-message')


                    <div class="grid lg:grid-cols-2 sm:grid-cols-2 gap-4">



<a href="{{ route('markets.primaryBonds') }}">
<div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">

  <div>
    <p class="mb-2 text-sm font-medium text-purple-600 dark:text-gray-400">
      Government Bonds
    </p>
    <p class="text-gray-600 text-sm mb-4">
        A government bond is a debt instrument issued by the Government of Zambia through Bank of Zambia. By issuing this instrument, the Government is borrowing money from the buyers of this instrument; generally with a promise to pay periodic interest payments, and to repay a face value on the maturity date. Government bonds  are relatively long-term instruments with a minimum period of two years.
    </p>

  </div>
</div>
</a>

<a href="{{ route('markets.primaryBills') }}">
    <div class="h-44 flex p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">

      <div>
        <p class="mb-2 text-sm font-medium text-purple-600 dark:text-gray-400">
          Treasury Bill
        </p>
        <p class="text-gray-500 text-sm mb-4">
            A treasury bill is a short term instrument that the Zambian Government issues in order to borrow money through Bank of Zambia for a period of one year or less.
        </p>

      </div>
    </div>
    </a>




                    </div>


            </div>
        </div>
    </div>


</x-app-layout>
