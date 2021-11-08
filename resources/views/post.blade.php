<h1>{{$post->title}}</h1>
<br>
<br>
writen by <a href="authors/{{$post->user->id}}">  {{$post ->user->name}}</a>
<br>
{{$post->body}}
<br>
<a href="/categories/{{$post->category->id}}">{{$post->category->name}}</a>
