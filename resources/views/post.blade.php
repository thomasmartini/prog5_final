<h1>{{$post->title}}</h1>
<br>
<br>
{{$post->body}}
<a href="/categories/{{$post->category->id}}">{{$post->category->name}}</a>
