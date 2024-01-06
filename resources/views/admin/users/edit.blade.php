<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-600 leading-tight">
            {{ __('Edit user') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">
                    @include('layouts.errors-message')
                    <form action="{{ route('admin.users.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <label class="block mb-1 text-gray-600" for="username">Username</label>
                        <input
                            id="username"
                            name="username"
                            class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                            type="text"
                            value="{{ $user->username }}"/>
                        <label class="block mb-1 text-gray-600" for="name">Name</label>
                        <input
                            id="name"
                            name="name"
                            class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                            type="text"
                            value="{{ $user->name }}"/>
                        <label class="block mb-1 text-gray-600" for="email">Email</label>
                        <input
                            id="email"
                            name="email"
                            class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                            type="text"
                            value="{{ $user->email }}"/>
                        @isset($user->photo)
                            <img class="w-10 h-10 rounded-full object-cover"
                                 src="{{ asset('/storage/' . $user->photo) }}">
                            <label for="delete_photo">Delete photo</label>
                            <input name="delete_photo" type="checkbox"/>
                        @else
                            {!! Avatar::create($user->name)->toSvg() !!}
                        @endisset
                        <div class="flex flex-col">
                            <label for="photo">Upload profile photo</label>
                            <input
                                id="photo"
                                name="photo"
                                class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                                type="file"
                            />
                        </div>
                        <button type="submit" class="w-full h-10 px-5 mt-3 text-gray-100 transition-colors duration-200
                        bg-purple-600 rounded-lg focus:shadow-outline hover:bg-purple-700">Save profile</button>
                    </form>
                </div>
            </div>

    </div>

</x-app-layout>
