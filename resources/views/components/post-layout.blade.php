<!doctype html>
@props(['post'])
<title>CS:GO forum</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">

<body style="font-family: Open Sans, sans-serif">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <img src="/images/logo.png" width="165" height="16">
            </a>
        </div>

        <div class="mt-8 md:mt-0 flex items-center">
            @auth
                <a href="/forum/posts/create" class="text-xs font-bold uppercase">Create Post</a>
                <form method="get" action="/profile/{{auth()->id()}}">
                    <input type="hidden" value="{{auth()->id()}}" name="id" id="id">
                    @csrf
                    <button type="submit" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                        {{auth()->user()->name}}</button>

                </form>

                <form method="POST" action="/logout">
                    @csrf

                    <button type="submit" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">log-out</button>

                </form>

            @endauth
            @guest
                <a href="/register" class="text-xs font-bold uppercase">Register</a>

                <a href="/login" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    log In
                </a>
            @endguest
        </div>
    </nav>

    {{$slot}}
</section>
</body>
