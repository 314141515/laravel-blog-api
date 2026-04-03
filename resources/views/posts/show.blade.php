<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $post->title }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow rounded-lg p-8">
                <p class="text-gray-500 text-sm mb-6">{{ $post->created_at->diffForHumans() }}</p>
                <div class="text-gray-800 leading-relaxed">{{ $post->body }}</div>

                @auth
                    <div class="mt-8 flex gap-4">
                        <a href="{{ route('posts.edit', $post) }}"
                           class="bg-black text-white px-4 py-2 rounded-lg text-sm">
                            Rediger
                        </a>
                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-600 text-white px-4 py-2 rounded-lg text-sm">
                                Slet
                            </button>
                        </form>
                    </div>
                @endauth
            </div>

            <a href="{{ route('posts.index') }}" class="mt-6 inline-block text-sm text-gray-500 hover:underline">
                ← Tilbage til oversigt
            </a>
        </div>
    </div>
</x-app-layout>