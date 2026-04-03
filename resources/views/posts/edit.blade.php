<x-app-layout>
    <main class="py-16">
        <div class="max-w-2xl mx-auto px-6">

            <a href="{{ route('posts.show', $post) }}"
               class="inline-flex items-center gap-1 text-sm text-gray-400 hover:text-gray-900 transition-colors duration-200 mb-10">
                ← Tilbage
            </a>

            <header class="mb-8">
                <h1 class="text-3xl font-semibold tracking-tight text-gray-900">Rediger indlæg</h1>
            </header>

            <form action="{{ route('posts.update', $post) }}" method="POST" class="space-y-6">
                @csrf
                @method('PUT')

                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Titel</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $post->title) }}"
                           class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all duration-200">
                    @error('title')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="body" class="block text-sm font-medium text-gray-700 mb-2">Indhold</label>
                    <textarea name="body" id="body" rows="12"
                              class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all duration-200 resize-none">{{ old('body', $post->body) }}</textarea>
                    @error('body')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex gap-3">
                    <button type="submit"
                            class="flex-1 text-sm font-medium text-white bg-gray-900 hover:bg-gray-700 py-3 rounded-xl transition-all duration-200">
                        Gem ændringer
                    </button>
                    <a href="{{ route('posts.show', $post) }}"
                       class="flex-1 text-center text-sm font-medium text-gray-500 hover:text-gray-900 border border-gray-200 py-3 rounded-xl transition-all duration-200">
                        Annuller
                    </a>
                </div>

            </form>
        </div>
    </main>
</x-app-layout>