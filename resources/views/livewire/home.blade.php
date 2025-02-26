<div>
    <div class="py-11 mx-auto max-w-7xl px-6 lg:px-8">
        <div class="mb-4 mx-auto max-w-2xl lg:max-w-full flex flex-wrap gap-2">
            <button wire:click="$set('selectedCategory', null)"
                class="px-4 py-2 rounded-sm cursor-pointer bg-gray-200 hover:bg-gray-300 {{ is_null($selectedCategory) ? 'bg-gray-400 text-white' : '' }}">
                All
            </button>
            @foreach ($categories as $category)
                <button wire:click="$set('selectedCategory', {{ $category->id }})"
                    class="px-4 py-2 rounded-sm cursor-pointer bg-gray-200 hover:bg-gray-300 {{ $selectedCategory == $category->id ? 'bg-gray-400 text-white' : '' }}">
                    {{ $category->name }}
                </button>
            @endforeach
        </div>
        <div class="flex justify-center mx-auto max-w-2xl lg:max-w-full mt-10">
            <input type="text" wire:model.live="search" placeholder="Cari pekerjaan..."
                class="w-full border border-gray-600 text-white placeholder-gray-300 rounded-xl px-5 py-3 focus:outline-2 focus:outline-violet-500" />
        </div>
        <div
            class="mx-auto mt-10 tex grid max-w-2xl grid-cols-1 gap-x-8 gap-y-16 border-t border-gray-200 pt-10 lg:mx-0 lg:max-w-none lg:grid-cols-3">
            @if ($posts->isEmpty())
                <p class="text-white">Post job tidak ditemukan.</p>
            @else
                @foreach ($posts as $post)
                    <article wire:key="{{ $post->id }}"
                        class="w-full flex flex-col items-start justify-center lg:mb-10 bg-slate-800 p-6 rounded-lg shadow-lg transition-all duration-300 hover:shadow-[0px_0px_20px_rgba(255,255,255,0.2)]">
                        <div class="flex items-center gap-x-4 text-xs">
                            <time datetime="{{ $post->created_at->format('Y-m-d') }}"
                                class="text-white">{{ $post->created_at->format('M d, Y') }}</time>
                            <a href="#"
                                class="relative z-10 rounded-full bg-gray-50 px-3 py-1.5 font-medium text-gray-600 hover:bg-gray-100">
                                {{ $post->category->name }}
                            </a>
                        </div>
                        <div class="group relative">
                            <h3 class="mt-3 text-lg font-semibold text-white">
                                <a href="{{ route('post.detail', $post->id) }}" wire:navigate>
                                    <span class="absolute inset-0"></span>
                                    {{ $post->title }}
                                </a>
                            </h3>
                            <p class="mt-5 line-clamp-3 text-sm text-white">
                                {!! Str::words(strip_tags(str($post->content)->sanitizeHtml()), 20, '...') !!}
                            </p>
                        </div>
                    </article>
                @endforeach
            @endif
        </div>

        <div class="livewire-pagination mt-20 lg:mt-6">
            {{ $posts->links(data: ['scrollTo' => false]) }}
        </div>
    </div>
</div>
