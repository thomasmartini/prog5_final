<article
    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5">
        <div>
            <a href="/forum/{{$post->slug}}">
                <img src="{{asset('storage/' . $post->thumbnail )}}" onerror="this.style.display='none'"
                     class="rounded-xl">
            </a>
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="space-x-2">
                    <a href="/?category={{$post->category->slug}}"
                       class="px-3 py-1 border border-red-300 rounded-full text-red-300 text-xs uppercase font-semibold"
                       style="font-size: 10px">{{$post->category->name}}</a>
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/forum/{{$post->slug}}">
                            {{$post->title}}
                        </a>
                    </h1>


                    <span class="mt-2 block text-gray-400 text-xs">
                                        Published <time>{{$post->created_at->diffForHumans()}}</time>
                                    </span>
                </div>
            </header>

            <div class="text-sm mt-4">
                <p>
                    {{mb_strimwidth($post->body, 0, 100, "...")}}

                </p>


            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3">
                        <h5 class="font-bold"><a href="/?user={{$post->user->username}}">{{$post ->user->username}}</a>
                        </h5>

                    </div>
                </div>

                <div>
                    @if($post->user->id == auth()->id() or auth()->user()->role == 'admin')

                        <form method="POST" action="/forum/{{$post->id}}/delete">
                            @csrf
                            @method('DELETE')

                            <button
                                class="bg-red-500 rounded-full text-xs font-semibold text-white uppercase py-3 px-5 mt-3">
                                Delete post
                            </button>

                        </form>


                        <br>

                    @endif
                    <a href="/forum/{{$post->slug}}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    > Read More</a>

                </div>
            </footer>
        </div>
    </div>
</article>
