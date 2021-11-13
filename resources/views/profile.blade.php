<!doctype html>
<html lang="">
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CS:GO forum</title>
</head>
<body>

<x-layout>
    <header class="max-w-xl mx-auto mt-20 text-center">
        <h1 class="text-4xl">
            <span class="text-blue-500">Welcome {{ucwords(auth()->user()->name)}}</span>
        </h1>


        <p class="text-sm mt-14">
            Here are all of your posts
        </p>

        <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        </div>
    </header>
    @if($posts->count())
        <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">


            <div class="lg:grid lg:grid-cols-3">
                @foreach($posts as $post)
                    <x-post-article :post="$post" />
                @endforeach

                @else
                    <p>No posts found</p>
                @endif

            </div>
            {{$posts->links()}}
        </main>

</x-layout>
</body>
</html>
