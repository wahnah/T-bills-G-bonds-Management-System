<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-600 leading-tight">
            {{ __('Confirm Deposit') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">
                        @include('layouts.errors-message')
                        <form action="{{ route('admin.deposits.update', $deposit->id) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')


                            <img class="mx-auto w-100 h-100 object-contain object-cover"
    src="{{ asset('/storage/' . $deposit->deposit_slip) }}" id="deposit-slip" onmouseover="zoomIn()" onmouseout="zoomOut()">

<script>
function zoomIn() {
  document.getElementById("deposit-slip").style.transform = "scale(1.1)";
}

function zoomOut() {
  document.getElementById("deposit-slip").style.transform = "scale(1)";
}
</script>

                            <label class="block mb-1 text-gray-600" for="username">Amount</label>
                            <input
                                id="amount"
                                name="amount"
                                class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                                type="number"
                                value="{{ $deposit->amount }}"/>
                                <label class="block mb-1 text-gray-600" for="status">Status</label>
                                <select id="status" name="status" class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50">
                                  <option value="approved">Approved</option>
                                  <option value="rejected">Rejected</option>
                                </select>

                            <input
                                id="user_id"
                                name="user_id"
                                class="w-full h-10 px-3 mb-2 text-base text-gray-700 border rounded-lg focus:shadow-outline"
                                type="hidden"
                                value="{{ $deposit->user_id}}"/>

                            <button type="submit" class="w-full h-10 px-5 mt-3 text-gray-100 transition-colors duration-200
                            bg-purple-600 rounded-lg focus:shadow-outline hover:bg-purple-700">Update</button>
                        </form>
                    </div>
                </div>

        </div>

</x-app-layout>
