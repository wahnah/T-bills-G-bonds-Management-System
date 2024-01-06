<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-600 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">
                @include('layouts.success-message')
                <div class="w-full overflow-hidden rounded-lg shadow-xs">
                    <div class="w-full overflow-x-auto">
                        <table class="w-full whitespace-no-wrap">
                            <thead>
                                <tr
                                    class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                    <th class="px-4 py-3">
                                        Username
                                    </th>
                                    <th class="px-4 py-3">
                                        Name
                                    </th>
                                    <th class="px-4 py-3">
                                        Email
                                    </th>
                                    <th class="px-4 py-3">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                                @forelse($users as $user)
                                    <tr class="text-gray-700 dark:text-gray-400">
                                        <td class="px-4 py-3">
                                            <div class="flex items-center">
                                                <div>
                                                    @isset($user->photo)
                                                        <img class="w-10 h-10 rounded-full object-cover"
                                                            src="{{ asset('/storage/' . $user->photo) }}">
                                                    @else
                                                        {!! Avatar::create($user->name)->toSvg() !!}
                                                    @endisset
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm text-gray-900">
                                                        {{ $user->username }}
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="px-4 py-3 text-sm">

                                            {{ $user->name }}

                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            <div class="text-sm text-gray-900">{{ $user->email }}</div>
                                        </td>
                                        <td class="px-4 py-3 text-sm">
                                            <a href="{{ route('admin.users.edit', $user->id) }}"
                                                class="flex items-center justify-between px-2 py-2 text-sm font-medium leading-5 text-purple-600 rounded-lg dark:text-gray-400 focus:outline-none focus:shadow-outline-gray">
                                                <svg class="w-5 h-5" aria-hidden="true" fill="currentColor"
                                                    viewBox="0 0 20 20">
                                                    <path
                                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                    </path>
                                                </svg>
                                            </a>
                                        </td>
                                    </tr>
                                @empty
                                    There are no users.
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="mt-2">{{ $users->links() }}</div>
            </div>
        </div>

    </div>
</x-app-layout>
