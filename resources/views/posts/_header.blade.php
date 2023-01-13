<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-4xl">
        Latest <span class="text-blue-500">Laravel From Scratch</span> News
    </h1>

    <h2 class="inline-flex mt-2">Designed By Sohel Mahmud <img src="/images/lary-head.svg" alt="Head of Lary the mascot">
    </h2>


    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-4">

        <div class="relative lg:inline-flex items-center bg-gray-100 rounded-xl">

            {{-- dorpdown using alpine --}}

            {{-- this <x-cateogry-dropdown/> component has dedicated component class app\View\Components\CategoryDropdown, data is coming from that class --}}
            {{-- Make dedicated component class if its used in too many views and controllers --}}
            {{-- If no dedicated component class is made then simply just pass props, props part is commented out --}}

            <x-category-dropdown {{-- :categories="$categories" :currentCategory="$currentCategory" --}}>

                {{-- This is a slot, will be used in dropdown as $slot --}}
                <a href="/?{{ http_build_query(request()->except('category','page')) }}"  class="block text-left px-3 text-sm leading-6 hover:bg-gray-300 focus:bg-gray-300">All
                    Categories</a>

                {{-- Custom slot --}}
                <x-slot name="svg_slot">
                    <x-icon name="down-arrow" />
                </x-slot>

            </x-category-dropdown>


        </div>



        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="/">
                {{-- for requesting both category and search --}}
                @if (request('category'))
                    <input type="hidden" name="category" value="{{ request('category') }}">
                @endif

                <input type="text" name="search" placeholder="Find something"
                    value="{{ request('search') }}" class="bg-transparent placeholder-black font-semibold text-sm">
            </form>
        </div>
    </div>
</header>
