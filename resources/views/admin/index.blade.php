<x-app-layout>
    <div class="max-w-3xl mx-auto space-y-6 p-6">
        <h1 class="text-2xl font-semibold mb-6 text-black dark:text-white">Pending Posts</h1>

        @if ($posts->isEmpty())
            <p class="text-gray-500">No pending posts at the moment.</p>
        @else
            @foreach($posts as $post)
                <div class="bg-white shadow rounded-md p-4 flex flex-col md:flex-row md:justify-between md:items-center">
                    <p class="text-gray-800 mb-4 md:mb-0 flex-1">{{ $post->content }}</p>

                    <div class="flex space-x-3">
                        <form method="POST" action="{{ route('admin.posts.accept', $post) }}">
                            @csrf
                            <button type="submit"
                                class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                                Accept
                            </button>
                        </form>

                        <form method="POST" action="{{ route('admin.posts.decline', $post) }}">
                            @csrf
                            <button type="submit"
                                class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500">
                                Decline
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</x-app-layout>
