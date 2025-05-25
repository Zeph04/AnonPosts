<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Anonymous Posts') }}
            </h2>

            <!-- Create Post Button -->
            <a href="{{ route('posts.create') }}"
               class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition ease-in-out duration-150">
                Create Anon Post
            </a>
        </div>
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6">
        @if($posts->isEmpty())
            <p class="text-gray-500 dark:text-gray-400 text-center">No posts found.</p>
        @else
            <div class="space-y-4">
                @foreach($posts as $post)
                    <div class="p-4 bg-white dark:bg-gray-700 shadow rounded-lg">
                        <p class="text-gray-900 dark:text-gray-100 whitespace-pre-line">{{ $post->content }}</p>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</x-app-layout>
