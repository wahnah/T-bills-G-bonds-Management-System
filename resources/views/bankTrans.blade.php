<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Bank Transfer') }}
        </h2>
    </x-slot>

    <form action="{{ route('profile.addMoney') }}" method="POST">
    @csrf
    <label for="amount">Amount:</label>
    <input type="number" name="amount" id="amount">
    <button type="submit">Top up balance</button>
</form>


</x-app-layout>
