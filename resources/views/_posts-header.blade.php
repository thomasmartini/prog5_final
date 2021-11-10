<header class="max-w-xl mx-auto mt-20 text-center">
    <h1 class="text-4xl">
        <span class="text-blue-500">CS:GO FORUM</span>
    </h1>


    <p class="text-sm mt-14">
       A place to share your passion for CS:GO
    </p>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        <!--  Category -->
        <div class="relative lg:inline-flex bg-gray-100 rounded-xl">

            <div x-data="{ show: false }" @click.away="show = false">
                <button
                    @click="show = ! show"
                    class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex"
                >{{isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories'}}

                    <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
                         height="22" viewBox="0 0 22 22">
                        <g fill="none" fill-rule="evenodd">
                            <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                            </path>
                            <path fill="#222"
                                  d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                        </g>
                    </svg>

                </button>

                <div x-show="show" class="py-2 position-absolute bg-gray-100 rounded-xl" style="display: none">
                    <a class="block text-left px-3 text-small leading-7 hover:bg-gray-300 focus:bg-gray-300"
                       href="/">All</a>
                    @foreach($categories as $category)
                        <a href="/?category={{$category->slug}}"
                           class="
                            block text-left px-3 text-small
                            leading-7 hover:bg-gray-300 focus:bg-gray-300


                            {{isset($currentCategory) && $currentCategory->is($category) ? 'bg-blue-500 text-white' : ''}}
                               "
                        >{{ ucwords($category->name)}}</a>

                    @endforeach
                </div>


            </div>


        </div>


        <!-- Search -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="/">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{request('category')}}">
                @endif

                <input
                    type="text"
                    name="search"
                    placeholder="Find A Post"
                    value="{{request('search')}}"
                    class="bg-transparent placeholder-black font-semibold text-small">
            </form>
        </div>
    </div>
</header>
