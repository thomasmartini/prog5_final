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
    <h2>CS:GO Forum</h2>
</div>

<div class="row">
    <div class="leftcolumn">
        @foreach($posts as $post)
        <div class="card">
            <a href="/forum/{{$post->id}}"> <h2>{{$post->title}}</h2>
            <h5>{{$post->excerpt}}</h5>
            <div class="fakeimg" style="height:200px;">Image</div>
            <p>Some text..</p>
            </a>
        </div>
        @endforeach
    </div>
</div>


</body>
</html>
