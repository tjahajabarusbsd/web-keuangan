<div class="container max-w-7xl mx-auto px-4 py-8 flex flex-col lg:flex-row gap-8">
    <!-- Main Content -->
    <div class="w-full lg:w-3/4 text-white bg-slate-800 p-6 rounded-lg shadow-lg overflow-hidden">
        <!-- Title Section -->
        <div class="p-6">
            <h1 class="text-3xl font-bold text-white">{{ $post->title }}</h1>
        </div>

        <!-- Content Section -->
        <div class="p-6">
            <!-- Date and Category -->
            <div class="flex items-center justify-between text-sm ext-gray-500">
                <p>{{ $post->created_at->format('M d, Y') }}</p>
                <span class="inline-block px-3 py-1 rounded-full text-gray-600 bg-blue-100 ext-blue-600 font-medium">
                    {{ $post->category->name ?? 'Uncategorized' }}
                </span>
            </div>

            <!-- Title -->
            <h1 class="mt-2 text-2xl font-bold text-white">
                {{ $post->name }}
            </h1>

            <!-- Body Content -->
            <div class="mt-4 text-white">
                {!! str($post->content)->sanitizeHtml() !!}
            </div>
        </div>
    </div>

    <!-- Sidebar -->
    <aside class="w-full lg:w-1/4 bg-slate-800 rounded-lg shadow-md p-4 max-h-fit relative md:sticky md:top-5">
        <h2 class="text-lg font-semibold text-white mb-4">Job Terbaru</h2>
        <ul class="space-y-3">
            @foreach ($latestPosts as $latest)
                <li class="text-gray-300">
                    <a href="{{ route('post.detail', $latest->id) }}" wire:navigate
                        class="block text-gray-300 hover:text-white">
                        {{ $latest->title }}
                    </a>
                </li>
            @endforeach
        </ul>
    </aside>

    <style>
        ul {
            list-style: disc;
            padding-left: 1.5rem;
        }

        li {
            margin-bottom: 0.5rem;
        }
    </style>
</div>
