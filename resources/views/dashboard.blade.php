<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-600 leading-tight">
            {{ __('Investor Portfolio') }}
        </h2>
    </x-slot>



    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">

                    @include('layouts.success-message')


                    <div class="grid lg:grid-cols-2 sm:grid-cols-2 gap-4">



                        <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
                >
                  <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                    <path
                      fill-rule="evenodd"
                      d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z"
                      clip-rule="evenodd"
                    ></path>
                  </svg>
                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Account balance
                  </p>
                  <p
                    class="text-lg font-semibold text-purple-600 dark:text-gray-200"
                  >
                  ZMK {{ number_format(Auth::user()->balance, 0, ',', ',') }}
                  </p>
                </div>
              </div>

              <div
                class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800"
              >
                <div
                  class="p-3 mr-4 text-green-500 bg-green-100 rounded-full dark:text-green-100 dark:bg-green-500"
                >
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                    <path d="M4.5 3.75a3 3 0 00-3 3v.75h21v-.75a3 3 0 00-3-3h-15z" />
                    <path fill-rule="evenodd" d="M22.5 9.75h-21v7.5a3 3 0 003 3h15a3 3 0 003-3v-7.5zm-18 3.75a.75.75 0 01.75-.75h6a.75.75 0 010 1.5h-6a.75.75 0 01-.75-.75zm.75 2.25a.75.75 0 000 1.5h3a.75.75 0 000-1.5h-3z" clip-rule="evenodd" />
                  </svg>


                </div>
                <div>
                  <p
                    class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400"
                  >
                    Total invested
                  </p>
                  <p
                    class="text-lg font-semibold text-purple-600 dark:text-gray-200"
                  >
                    ZMK {{ number_format($totalAmount, 0, ',', ',') }}
                  </p>
                </div>
              </div>
                    </div>


            </div>
        </div>
    </div>
    @if (Auth::check() && Auth::user()->role == 0)
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">

                    <h3 class="mb-4 font-semibold text-lg text-purple-600 leading-tight">Your Government Bond Investments
                    </h3>
                    <user-purchases></user-purchases>

            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">

                    <h3 class="mb-4 font-semibold text-lg text-purple-600 leading-tight">Your Treasury Bill Investments
                    </h3>
                    <user-purchasez></user-purchasez>

                    @can('edit users')
                        <div class="flex">
                            <a href="{{ route('admin.users.index') }}"
                                class="flex justify-center items-center h-10 w-40 px-5 mt-3 mr-5 text-gray-100 transition-colors duration-200
                        bg-gray-500 rounded-lg focus:shadow-outline hover:bg-gray-600">
                                Show all users
                            </a>
                            <a href="{{ route('admin.lots.index') }}"
                                class="flex justify-center items-center h-10 w-40 px-5 mt-3 mr-5 text-gray-100 transition-colors duration-200
                        bg-gray-500 rounded-lg focus:shadow-outline hover:bg-gray-600">
                                Show all lots
                            </a>
                        </div>
                    @endcan

            </div>
        </div>
    </div>
   <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">

                    <h3 class="mb-4 font-semibold text-lg text-purple-600 leading-tight">Your Secondary Market Investments
                    </h3>
                    <sec-purchases></sec-purchases>

            </div>
        </div>
    </div>
    @else
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">



                    <div class="grid lg:grid-cols-3 sm:grid-cols-3 gap-4">



<a href="{{ route('admin.lots.create') }}" class="text-purple-600 dark:text-purple-400 font-semibold text-sm">
<div style="justify-content: center;
align-items: center;" class="w-86 h-36 flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">

  <div>
    <p class="mb-2 text-sm font-bold text-purple-600 dark:text-gray-400">
      Create Security
    </p>


  </div>
</div>
</a>


<a href="{{ route('admin.auctions.index') }}" class="text-purple-600 dark:text-purple-400 font-semibold text-sm">
    <div style="justify-content: center;
    align-items: center;" class="w-86 h-36 flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">

      <div>
        <p class="mb-2 text-sm font-bold text-purple-600 dark:text-gray-400">
          Create Auction
        </p>


      </div>
    </div>
    </a>
    <a href="{{ route('admin.deposits.depo') }}" class="text-purple-600 dark:text-purple-400 font-semibold text-sm">
        <div style="justify-content: center;
        align-items: center;" class="w-86 h-36 flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
          <div>
            <p class="mb-2 text-sm font-bold text-purple-600 dark:text-gray-400">
              User Deposits
            </p>


          </div>
        </div>
        </a>

              <a href="{{ route('admin.users.index') }}" class="text-purple-600 dark:text-purple-400 font-semibold text-sm">
                <div style="justify-content: center;
                align-items: center;" class="w-86 h-36 flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">

                  <div>
                    <p class="mb-2 text-sm font-bold text-purple-600 dark:text-gray-400">
                      Users
                    </p>

                  </div>
                </div>
                </a>

                <a href="{{ route('admin.prices.index') }}" class="text-purple-600 dark:text-purple-400 font-semibold text-sm">
                    <div style="justify-content: center;
                    align-items: center;" class="w-86 h-36 flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">

                      <div>
                        <p class="mb-2 text-sm font-bold text-purple-600 dark:text-gray-400">
                          Update Issue Prices
                        </p>


                      </div>
                    </div>
                    </a>


                    <a href="{{ route('admin.pdfs.view') }}" class="text-purple-600 dark:text-purple-400 font-semibold text-sm">
                        <div style="justify-content: center;
                        align-items: center;" class="w-86 h-36 flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">

                          <div>
                            <p class="mb-2 text-sm font-bold text-purple-600 dark:text-gray-400">
                              Bids
                            </p>


                          </div>
                        </div>
                        </a>

                        <a href="{{ route('lots.index') }}" class="text-purple-600 dark:text-purple-400 font-semibold text-sm">
                            <div style="justify-content: center;
                            align-items: center;" class="w-86 h-36 flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">

                              <div>
                                <p class="mb-2 text-sm font-bold text-purple-600 dark:text-gray-400">
                                  My securities
                                </p>


                              </div>
                            </div>
                            </a>



                        <a href="{{ route('admin.resold') }}" class="text-purple-600 dark:text-purple-400 font-semibold text-sm">
                            <div style="justify-content: center;
                            align-items: center;" class="w-86 h-36 flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
    <div>
      <p class="mb-2 text-sm font-bold text-purple-600 dark:text-gray-400">
        Check resold securities
      </p>
    </div>
  </div>
</a>
                    </div>


            </div>
        </div>
    </div>
    @endif

</x-app-layout>
