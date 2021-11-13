<x-layout>
    <section class="px-6 py-8 mt-10">
        <main class="max-w-lg mx-auto">
            <h1 class="text-center font-bold text-xl">Register a new admin!</h1>

            <form method="POST" action="/admin/register" class="mt-10">
                @csrf

                <div class="mb-6">
                    <label class="block mb-2 uppservase font-bold text-small text-gray-700"
                           for="name"
                    >
                        name

                    </label>
                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           placeholder="name"
                           name="name"
                           id="name"
                           value="{{old('name')}}"
                           required
                    >
                    @error('name')
                    <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                    @enderror

                    <div class="mb-6 mt-6">
                        <label class="block mb-2 uppservase font-bold text-small text-gray-700"
                               for="username"
                        >
                            username

                        </label>
                        <input class="border border-gray-400 p-2 w-full"
                               type="text"
                               placeholder="username"
                               name="username"
                               id="username"
                               value="{{old('username')}}"
                               required
                        >
                        @error('username')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>

                    <div class="mb-6 mt-6">
                        <label class="block mb-2 uppservase font-bold text-small text-gray-700"
                               for="email"
                        >
                            Email

                        </label>
                        <input class="border border-gray-400 p-2 w-full"
                               type="email"
                               placeholder="email"
                               name="email"
                               id="email"
                               value="{{old('email')}}"
                               required
                        >
                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="mb-6">
                        <label class="block mb-2 uppservase font-bold text-small text-gray-700"
                               for="password"
                        >
                            password

                        </label>
                        <input class="border border-gray-400 p-2 w-full"
                               type="password"
                               placeholder="password"
                               name="password"
                               id="password"
                               required
                        >
                        @error('password')
                        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
                        @enderror
                        <div class="mb-6">
                            <button type="submit"
                                    class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500 mt-4">

                                submit
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    </section>
</x-layout>
