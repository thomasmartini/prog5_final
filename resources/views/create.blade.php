<x-layout>
    <section class="px-6 py-8">
<form method="post" action="/posting" class="max-w-sm mx-auto">
    @csrf

    <div class="mb-6">
        <label class="block mb-2  font-bold text-small text-gray-700"
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
                   for=body"
            >
              Write your post

            </label>
            <textarea class="border border-gray-400 p-2 w-full"
                   name="body"
                   id="body"
                   value="{{old('body')}}"
                   required
            ></textarea>
            @error('body')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>
    </div>
    <div class="mb-6">
        <button type="submit"
                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mt-4">

            submit
        </button>
</form>

    </section>

</x-layout>
