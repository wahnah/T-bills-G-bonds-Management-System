<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-600 leading-tight">
            {{ __('Transaction History') }}
        </h2>
    </x-slot>


        <div class="py-12">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <div class="overflow-hidden shadow-sm sm:rounded-lg">
        <table class="w-full whitespace-no-wrap">
            <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    <th class="flex-1 px-4 py-3">
                        Amount
                    </th>
                    <th class="flex-1 px-4 py-3">
                        Status
                    </th>
                    <th class="flex-1 px-4 py-3">
                        Date
                    </th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($deposits as $deposit)
                    <tr class="text-gray-700 dark:text-gray-400">
                        <td class="flex-1 px-4 py-3 text-sm">
                            ZMK {{ $deposit->amount }}
                        </td>
                    </td>
                    <td class="px-4 py-3 text-xs">
                        @if($deposit->status == 'approved')
                            <span class="px-2 py-1 font-semibold leading-tight text-green-700 bg-green-100 rounded-full dark:bg-green-700 dark:text-green-100">
                                Approved
                            </span>
                        @elseif($deposit->status == 'pending')
                            <span class="px-2 py-1 font-semibold leading-tight text-yellow-700 bg-yellow-100 rounded-full dark:bg-yellow-700 dark:text-yellow-100">
                                Pending
                            </span>
                        @elseif($deposit->status == 'rejected')
                            <span class="px-2 py-1 font-semibold leading-tight text-red-700 bg-red-100 rounded-full dark:bg-red-700 dark:text-red-100">
                                Rejected
                            </span>
                        @endif
                    </td>
                        <td class="flex-1 px-4 py-3 text-sm">
                            {{ $deposit->updated_at }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-2">
        {{ $deposits->links() }}
    </div>
</div>
        </div>





</x-app-layout>
