<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-purple-600 leading-tight">
            {{ __('Home') }}
        </h2>
    </x-slot>
<div class="flex justify-center items-center h-screen">
    <div class="py-12 ">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden ">
                <div class="grid lg:grid-cols-2 sm:grid-cols-2 gap-2">
                    <div class="text-5xl font-extrabold">
                    <span class="bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-gray-600">
                    WELCOME TO THE GOVERNMENT SECURITIES MANAGEMENT SYSTEM
                    </span>
                    </div>

                    <div style="display: flex; flex-direction: column; gap: 20px;">

                        <slide-show></slide-show>
                        <!--<p class="text-purple-600 font-bold tracking-wide text-left uppercase dark:text-gray-400" style="font-size: 16px;"><strong>Begin Your Investment Journey</strong></p>
                        <br>
                        <a href="{{ route('admin.pdfs.generatePdf') }}" class="text-center px-10 py-4 font-medium leading-5 text-purple-600 transition-colors duration-150 bg-transparent border border-purple-600 rounded-lg active:bg-purple-600 hover:bg-gray-400 focus:outline-none focus:shadow-outline-purple" style="display: block; margin: 0 auto;">
                            Register
                        </a>-->
                    </div>
                </div>
          </div>
        </div>
      </div>
</div>
    <br/>

</x-app-layout>
