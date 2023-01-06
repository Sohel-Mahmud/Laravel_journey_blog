<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-4xl">
        Latest <span class="text-blue-500">Laravel From Scratch</span> News
    </h1>

    <h2 class="inline-flex mt-2">Designed By Sohel Mahmud <img src="/images/lary-head.svg" alt="Head of Lary the mascot"></h2>


    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">

        <div class="relative lg:inline-flex items-center bg-gray-100 rounded-xl">

            {{-- dorpdown using alpine --}}

            <x-category-dropdown :categories="$categories" :currentCategory="$currentCategory">

                {{-- This is a slot, will be used in dropdown as $slot --}}
                <a href="/" class="block text-left px-3 text-sm leading-6 hover:bg-gray-300 focus:bg-gray-300">All
                    Categories</a>

                {{-- Custom slot --}}
                <x-slot name="svg_slot">
                    <x-icon name="down-arrow" />
                </x-slot>

            </x-category-dropdown>


        </div>



        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="#">
                <input type="text" name="search" placeholder="Find something"
                    value="{{ request('search') }}"
                    class="bg-transparent placeholder-black font-semibold text-sm">
            </form>
        </div>
    </div>
</header>
