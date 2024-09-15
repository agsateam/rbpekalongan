<div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto my-16">
    <h4 class="text-xl md:text-4xl font-bold mb-5">Berita Terkini</h4>
    @if (count($igposts['data']) == 0)
        <span class="text-xl">Belum ada berita yang bisa ditampilkan...</span>
    @endif
    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
        @foreach ($igposts['data'] as $post)
        <div class="w-full flex flex-col">
            @if ($post['media_type'] == "VIDEO")
                <img src="{{ $post['thumbnail_url'] }}" class="w-full">
            @else
                <img src="{{ $post['media_url'] }}" class="w-full">
            @endif

            <a target="_blank" href="{{ $post['permalink'] }}" class="mt-3 text-xl font-bold text-[#195770]">
                {{ Str::limit(Str::replace("\n", " ", $post['caption']), 70, preserveWords: true) }}
            </a>
            <span class="mt-1 text-sm text-gray-500">
                {{ Carbon\Carbon::createFromTimeString($post['timestamp'])->format('d M Y') }}
            </span>
        </div>
        @endforeach
    </div>
</div>