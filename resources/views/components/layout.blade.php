<!doctype html>

<title>CS:GO forum</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
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
                <a href="/forum/posts/create" class="text-xs font-bold uppercase px-3">Create Post</a>
                @if(auth()->user()->role == 'admin')
                <a href="/admin" class="text-xs font-bold uppercase">Admin</a>
                @endif
            <form method="get" action="/profile/{{auth()->id()}}">
                <input type="hidden" value="{{auth()->id()}}" name="id" id="id">
                @csrf
                <button type="submit" class="text-xs font-bold uppercase py-3 px-3">
                    {{auth()->user()->username}}</button>

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
@if(session()->has('succes'))
    <div x-data="{ show: true}"
         x-init="setTimeout(() => show = false, 4000)"
         x-show="show"
         class="fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-small">
        <p>
            {{session('succes')}}

        </p>
@endif
    </div>
</body>
