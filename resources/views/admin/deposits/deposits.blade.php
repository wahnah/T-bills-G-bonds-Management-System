<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-600 leading-tight">
            {{ __('Deposit Slips') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">
                    @include('layouts.success-message')
                    @include('layouts.errors-message')



                    <div class="w-full overflow-hidden rounded-lg shadow-xs">
                        <div class="w-full overflow-x-auto">
                            <table class="w-full whitespace-no-wrap">
                                <thead>
                                    <tr
                                        class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                                <th
                                                class="px-4 py-3">
                                                    User
                                                </th>
                                                <th
                                                class="px-4 py-3">
                                                    Amount
                                                </th>
                                                <th
                                                class="px-4 py-3">
                                                    Status
                                                </th>
                                                <th  class="px-4 py-3">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                            @foreach ($deposits as $deposit)
                                            <tr class="text-gray-700 dark:text-gray-400">
                                                <td class="px-4 py-3">
                                                    {{ $deposit->user->name }}
                                                </td>
                                                <td class="px-4 py-3">
                                                    {{ $deposit->amount }}
                                                </td>
                                                <td class="px-4 py-3">
                                                    {{ $deposit->status }}
                                                </td>
                                                <td class="px-4 py-3">
                                                    <a href="{{ route('admin.deposits.show', $deposit->id) }}"
                                                        class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">View</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>




                </div>
            </div>

    </div>



</x-app-layout>
