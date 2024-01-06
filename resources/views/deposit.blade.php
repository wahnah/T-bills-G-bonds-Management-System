<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-600 leading-tight">
            {{ __('Upload Deposit Slip') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">
                    @include('layouts.success-message')

                    <form action="{{ route('deposit.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                            <label class="block mb-1 text-gray-600" for="amount">Deposit Amount:</label>
                            <input type="number" name="amount" id="amount" class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50" required>


                            <label class="block mb-1 text-gray-600" for="deposit_slip">Deposit Slip:</label>
                            <input type="file" name="deposit_slip" id="deposit_slip" class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                                required>

                        <button type="submit"
                        class="w-full h-10 px-5 mt-3 text-gray-100 transition-colors duration-200
                        bg-purple-600 rounded-lg focus:shadow-outline hover:bg-purple-700">
                            Upload
                        </button>
                    </form>

                </div>
            </div>

    </div>

</x-app-layout>
