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
@include('_posts-header')
    @if($posts->count())
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
       <x-featured :post="$posts[0]"/>

        <div class="lg:grid lg:grid-cols-3">
        @foreach($posts->skip(1) as $post)
            <x-post-article :post="$post"/>
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
