<x-app-layout>
    @include('layouts.navigation')

    <div class="flex">
        <div class="inline-block w-64">
            <!-- Include your sidebar content here -->
            @include('layouts.slidebar')
        </div>

        <div class="container mx-auto px-4 py-8 inline">

            <div class="grid grid-cols-2 gap-4">
                <!-- Admin -->
                <a href="{{ route('agens.index') }}" class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-green-500">
                    <div class="p-3 mr-4 text-teal-500 bg-gray-400 rounded-full  dark:text-teal-100 dark:bg-teal-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-gear" viewBox="0 0 16 16">
                            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0m-9 8c0 1 1 1 1 1h5.256A4.5 4.5 0 0 1 8 12.5a4.5 4.5 0 0 1 1.544-3.393Q8.844 9.002 8 9c-5 0-6 3-6 4m9.886-3.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l-.074.136c-.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382zM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0"/>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Agens</p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">__</p>
                    </div>
                </a>

                <!-- Conges -->
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <a href="{{route('conges.index')}}" class="p-3 mr-4 text-blue-500 bg-blue-100 rounded-full dark:text-blue-100 dark:bg-blue-500">

                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                            <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0"/>
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5M1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4z"/>
                        </svg>
                    </a>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Conges</p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">--</p>
                    </div>
                </div>

                <!-- CV -->
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div class="p-3 mr-4 text-yellow-500 bg-yellow-100 rounded-full dark:text-yellow-100 dark:bg-yellow-500">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M12 14l8-6-8-6v12zm0 0l8-6-8-6v12zm-8 0a2 2 0 01-2-2V4a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-8l-4 4v-4H4z"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">CV</p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200">__</p>
                    </div>
                </div>

                <!-- Maintenance -->
                <div class="flex items-center p-4 bg-white rounded-lg shadow-xs dark:bg-gray-800">
                    <div class="p-3 mr-4 text-red-500 bg-red-100 rounded-full dark:text-red-100 dark:bg-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-activity" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M6 2a.5.5 0 0 1 .47.33L10 12.036l1.53-4.208A.5.5 0 0 1 12 7.5h3.5a.5.5 0 0 1 0 1h-3.15l-1.88 5.17a.5.5 0 1 1-.94-.44l1.96-5.387-.707-1.207-.707-1.207L6 3.964 4.47 8.171a.5.5 0 1 1-.94-.342l1.96-5.387-.707-1.207L6 2zm8 10.5a1.5 1.5 0 0 1-1.5 1.5h-11a1.5 1.5 0 0 1 0-3h2a.5.5 0 0 1 0 1H3a.5.5 0 0 0-.5.5v8a.5.5 0 0 0 .5.5h11a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 1 1 0v2z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="mb-2 text-sm font-medium text-gray-600 dark:text-gray-400">Maintenance</p>
                        <p class="text-lg font-semibold text-gray-700 dark:text-gray-200"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
