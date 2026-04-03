<x-app-layout>
    <main class="py-16">
        <div class="max-w-2xl mx-auto px-6">

            <a href="{{ route('posts.index') }}"
               class="inline-flex items-center gap-1 text-sm text-gray-400 hover:text-gray-900 transition-colors duration-200 mb-10">
                ← Tilbage
            </a>

            <header class="mb-8">
                <h1 class="text-3xl font-semibold tracking-tight text-gray-900">Nyt indlæg</h1>
            </header>

            <form action="{{ route('posts.store') }}" method="POST" class="space-y-6">
                @csrf

                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Titel</label>
                    <input type="text" name="title" id="title" value="{{ old('title') }}"
                           placeholder="Skriv en titel..."
                           class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all duration-200">
                    @error('title')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="body" class="block text-sm font-medium text-gray-700 mb-2">Indhold</label>
                    <textarea name="body" id="body" rows="12"
                              placeholder="Skriv dit indlæg her..."
                              class="w-full bg-gray-50 border border-gray-200 rounded-xl px-4 py-3 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-900 focus:border-transparent transition-all duration-200 resize-none">{{ old('body') }}</textarea>
                    @error('body')
                        <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit"
                        class="w-full text-sm font-medium text-white bg-gray-900 hover:bg-gray-700 py-3 rounded-xl transition-all duration-200">
                    Publicer
                </button>

            </form>
        </div>
    </main>
</x-app-layout>