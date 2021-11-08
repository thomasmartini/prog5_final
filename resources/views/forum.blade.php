<!doctype html>
<html lang="">

<link rel="stylesheet" type="text/css" href="{{ asset('css/forum.css') }}" />
<head>

    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>CS:GO forum</title>
</head>
<body>


<div class="header">
    <a href="/" ><h2>CS:GO Forum</h2></a>
</div>
@foreach($categories as $category)
    <a href="/categories/{{$category->id}}">{{$category->name}}</a>
@endforeach
<form method="GET" action="#">
<input type="text" name="search" placeholder="Find A Post">
</form>
<div class="row">
    <div class="leftcolumn">
        @foreach($posts as $post)
        <div class="card">
            <a href="/categories/{{$post->category->id}}">{{$post->category->name}}</a>
            <br><br>
            written by <a href="/authors/{{$post->user->id}}">  {{$post ->user->name}}</a>
            <a href="/forum/{{$post->slug}}"> <h2>{{$post->title}}</h2>
                <h5>{{$post->excerpt}}</h5>
            <div class="fakeimg" style="height:200px;">Image</div>

            </a>
        </div>
        @endforeach
    </div>
</div>


</body>
</html>
