<x-layout>
    <section class="py-8  max-w-md mx-auto ">

        <h1 class="text-lg font-bold mb-4 text-center ">Post something</h1>
<form method="POST" action="/forum/posts" class="max-w-sm mx-auto" enctype="multipart/form-data">
    @csrf

    <div class="mb-6">
        <label class="block mb-2 font-bold text-small text-gray-700"
               for="title"
        >
            title

        </label>
        <input class="border border-gray-400 p-2 w-full"
               type="text"
               placeholder="title"
               name="title"
               id="title"
               value="{{old('title')}}"
               required
        >
        @error('title')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror

        <div class="mb-6 mt-6">
            <label class="block mb-2  font-bold text-small text-gray-700"
                   for="body"
            >
              Write your post

            </label>
            <textarea class="border border-gray-400 p-2 w-full"
                   name="body"
                   id="body"
                   required
            >{{old('body')}}</textarea>
            @error('body')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-6 mt-6">
            <label class="block mb-2  font-bold text-small text-gray-700"
                   for="thumbnail"
            >
                Thumbnail

            </label>
            <input class="border border-gray-400 p-2 w-full"
            type="file"
            name="thumbnail"
            id="thumbnail">
            @error('thumbnail')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
        <div class="mb-6 mt-6">
            <label class="block mb-2  font-bold text-small text-gray-700"
                   for="category_id"
            >
            Category

            </label>

            <select name="category_id" id="category_id">
                @foreach(\App\Models\Category::all() as $category)
                <option value="{{$category->id}}" {{old('category_id') == $category->id  ? 'selected' : ''}}>{{ ucwords($category->name)}}</option>
                @endforeach
            </select>
            @error('category')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="mb-6">
        <button type="submit"
                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mt-4">

            submit
        </button>
    </div>
</form>

    </section>

</x-layout>
