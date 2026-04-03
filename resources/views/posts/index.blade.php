<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Blog
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            @auth
                <a href="{{ route('posts.create') }}"
                   class="mb-6 inline-block bg-black text-white px-4 py-2 rounded-lg text-sm">
                    Nyt indlæg
                </a>
            @endauth

            <div class="space-y-6">
                @forelse ($posts as $post)
                    <div class="bg-white shadow rounded-lg p-6">
                        <h2 class="text-xl font-bold mb-2">
                            <a href="{{ route('posts.show', $post) }}" class="hover:underline">
                                {{ $post->title }}
                            </a>
                        </h2>
                        <p class="text-gray-500 text-sm mb-4">{{ $post->created_at->diffForHumans() }}</p>
                        <p class="text-gray-700">{{ Str::limit($post->body, 150) }}</p>
                    </div>
                @empty
                    <p class="text-gray-500">Ingen indlæg endnu.</p>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>