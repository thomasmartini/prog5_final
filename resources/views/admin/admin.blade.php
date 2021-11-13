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

<x-admin-layout>
    <a href="/admin/register" class="text-xs font-bold uppercase px-3">Register new admin</a>

    <div class="flex flex-col mt-5">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Title
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                body
                            </th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Status
                            </th>


                        </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @if($posts->count())
                            @foreach($posts as $post)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <a href="/forum/{{$post->slug}}"> <img class="h-10 w-10 rounded-full"
                                                     src="{{asset('storage/' . $post->thumbnail )}}"
                                                                                       alt=""></a>
                                            </div>
                                            <div class="ml-4">
                                                <a href="/forum/{{$post->slug}}"><div class="text-sm font-medium text-gray-900">
                                                    {{$post->title}}
                                                    </div></a>
                                                <div class="text-sm text-gray-500">
                                                    {{$post->user->username}}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <a href="/forum/{{$post->slug}}"> <div
                                                class="text-sm text-gray-900">{{mb_strimwidth($post->body, 0, 50, "...")}}</div></a>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <form method="POST" action="/forum/posts/{{$post->id}}/active"
                                              class="max-w-sm mx-auto" enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')
                                            @if($post->active)

                 <button type="submit" class="bg-green-500 rounded-full text-xs font-semibold text-white uppercase py-3 px-5 mt-3">Active</button>
                </form>
                                        @endif
                                        @if(! $post->active)

                                            <button type="submit" class="bg-red-500 rounded-full text-xs font-semibold text-white uppercase py-3 px-5 mt-3">Not Active</button>
                                            </form>
                                            @endif
                                    </td>
                                    </td>

                                    <td>
                                        <form method="POST" action="/forum/{{$post->id}}/delete">
                                            @csrf
                                            @method('DELETE')

                                            <button
                                                class="bg-red-500 rounded-full text-xs font-semibold text-white uppercase py-3 px-5 mt-3">
                                                Delete post
                                            </button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        @endif

                        </tbody>
                    </table>
                </div>
            </div>
            {{$posts->links()}}
        </div>
    </div>

</x-admin-layout>
</body>
</html>
