<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-600 leading-tight">
            {{ __('Edit profile') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">

                    @include('layouts.errors-message')
                    <form action="{{ route('profile.update', Auth::id()) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <x-avatar />
                        @isset(Auth::user()->photo)
                            <label class="block mb-1 text-gray-600" for="delete_photo">Delete photo</label>
                            <input name="delete_photo" type="checkbox" />
                        @endisset
                        <div class="flex flex-col">
                            <label class="block mb-1 text-gray-600" for="photo">Upload profile photo</label>
                            <input id="photo" name="photo"
                                class="h-10 px-3 my-2 text-base text-gray-700 focus:shadow-outline" type="file" />
                        </div>
                        <label class="block mb-1 text-gray-600" for="name">Name</label>
                        <input id="name" name="name"
                        class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                            type="text" value="{{ Auth::user()->name }}" />
                        <label class="block mb-1 text-gray-600" for="email">Email</label>
                        <input id="email" name="email"
                        class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                            type="text" value="{{ Auth::user()->email }}" />
                        <label class="block mb-1 text-gray-600" for="phone">Phone Number</label>
                        <input id="phone" name="phone"
                        class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                            type="text" value="{{ Auth::user()->phone }}" />
                        <label class="block mb-1 text-gray-600" for="nrc">NRC</label>
                        <input id="nrc" name="nrc"
                        class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                            type="text" value="{{ Auth::user()->nrc }}" />
                        <label class="block mb-1 text-gray-600" for="csd">CSD Account Number</label>
                        <input id="csd" name="csd"
                        class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                            type="text" value="{{ Auth::user()->csd }}" />
                            <label class="block mb-1 text-gray-600" for="address">Address</label>
                            <input id="address" name="address"
                            class="w-full h-10 mb-2 mt-1 pl-3 pr-5 rounded-md shadow-sm border-purple-600 focus:border-purple-600 focus:ring focus:ring-purple-500 focus:ring-opacity-50"
                                type="text" value="{{ Auth::user()->address }}" />
                        <!--<label class="block mb-1 text-gray-600" for="signature">Signature</label>
                        <input type="file" name="signature" id="signature" class="w-full h-10 px-3 mb-2 text-base text-gray-700 border rounded-lg focus:shadow-outline">-->

                        <button type="submit"
                        class="w-full h-10 px-5 mt-3 text-gray-100 transition-colors duration-200
                        bg-purple-600 rounded-lg focus:shadow-outline hover:bg-purple-700">Save
                            profile</button>
                    </form>

            </div>
        </div>
    </div>
</x-app-layout>
