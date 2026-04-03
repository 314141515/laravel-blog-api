<x-app-layout>
    <main class="py-16">
        <div class="max-w-2xl mx-auto px-6">

            <a href="{{ route('posts.index') }}"
               class="inline-flex items-center gap-1 text-sm text-gray-400 hover:text-gray-900 transition-colors duration-200 mb-10">
                ← Tilbage
            </a>

            <article>
                <header class="mb-8">
                    <h1 class="text-3xl font-semibold tracking-tight text-gray-900">
                        {{ $post->title }}
                    </h1>
                    <p class="mt-2 text-sm text-gray-400">{{ $post->created_at->diffForHumans() }}</p>
                </header>

                <section class="prose prose-sm prose-gray max-w-none text-gray-700 leading-relaxed">
                    {{ $post->body }}
                </section>

                @auth
                    @if(auth()->user()->is_admin)
                        <footer class="mt-12 flex gap-3">
                            <a href="{{ route('posts.edit', $post) }}"
                               class="text-sm font-medium text-white bg-gray-900 hover:bg-gray-700 px-4 py-2 rounded-full transition-all duration-200">
                                Rediger
                            </a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                        class="text-sm font-medium text-red-500 hover:text-white hover:bg-red-500 border border-red-200 px-4 py-2 rounded-full transition-all duration-200">
                                    Slet
                                </button>
                            </form>
                        </footer>
                    @endif
                @endauth
            </article>

        </div>
    </main>
</x-app-layout>