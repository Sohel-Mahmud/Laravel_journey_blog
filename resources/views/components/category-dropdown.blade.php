<div x-data="{ show: false }">
    <button @click="show=!show" class="py-2 pl-3 pr-9 text-sm font-semibold w-full w-32 text-left flex lg:inline-flex">

        {{ isset($currentCategory) ? $currentCategory->name : 'Categories' }}

        {{ $svg_slot }}

    </button>

    <div x-show="show" @click.outside="show=false"
        class="py-2 absolute bg-gray-100 w-full mt-2 rounded-xl w-full z-50 overflow-auto max-h-52" style="display: none">

        {{ $slot }}

        @foreach ($categories as $category)
            {{-- http_build_query will receive the request and add & at the end john = john& --}}
            <a href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
                class="block text-left px-3 text-sm leading-6 hover:bg-gray-300 focus:bg-gray-300
                {{ isset($currentCategory) && $currentCategory->id == $category->id ? 'bg-blue-500 text-white' : '' }}
                ">{{ ucwords($category->name) }}</a>
        @endforeach

    </div>

</div>
