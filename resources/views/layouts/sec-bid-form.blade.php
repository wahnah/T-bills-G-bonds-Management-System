<p class="block mb-1 font-bold text-gray-600">Asking price: ZMK {{ $resell->price }}</p>
<br>
<form action="{{ route('resellbid') }}" method="post">
    @csrf
    <label  class="block mb-1 text-gray-600">Enter Price</label>
    <input class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
           type="number"
           name="resbid">
<br>
<br>
    <button name="resell" value="{{ $resell->id }}"
        class="w-full h-10 px-5 mt-3 text-gray-100 transition-colors duration-200
        bg-purple-600 rounded-lg focus:shadow-outline hover:bg-purple-700"
            type="submit">
        Place Bid
    </button>
</form>
