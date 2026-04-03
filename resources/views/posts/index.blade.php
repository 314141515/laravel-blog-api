<x-app-layout>
    <x-slot name="header">
        <h1 class="text-2xl font-semibold tracking-tight text-gray-900">
            Blog
        </h1>
    </x-slot>

    <main class="py-16">
        <div class="max-w-2xl mx-auto px-6">

            @auth
                @if(auth()->user()->is_admin)
                    <a href="{{ route('posts.create') }}"
                       class="mb-10 inline-flex items-center gap-2 text-sm font-medium text-white bg-gray-900 hover:bg-gray-700 px-4 py-2 rounded-full transition-all duration-200">
                        + Nyt indlæg
                    </a>
                @endif
            @endauth

            <section aria-label="Blogindlæg" class="space-y-4">
                @forelse ($posts as $post)
                    <article class="group bg-white border border-gray-100 rounded-2xl p-6 hover:shadow-md hover:-translate-y-0.5 transition-all duration-300 ease-out">
                        <a href="{{ route('posts.show', $post) }}" class="block">
                            <h2 class="text-lg font-semibold text-gray-900 group-hover:text-gray-600 transition-colors duration-200">
                                {{ $post->title }}
                            </h2>
                            <p class="mt-1 text-xs text-gray-400">{{ $post->created_at->diffForHumans() }}</p>
                            <p class="mt-3 text-sm text-gray-600 leading-relaxed">
                                {{ Str::limit($post->body, 120) }}
                            </p>
                        </a>
                    </article>
                @empty
                    <p class="text-sm text-gray-400">Ingen indlæg endnu.</p>
                @endforelse
            </section>

        </div>
    </main>
</x-app-layout>