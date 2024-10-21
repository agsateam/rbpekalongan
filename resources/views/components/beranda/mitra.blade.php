<div class="my-16 py-16">
    <div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto">
        <h4 class="text-xl md:text-4xl font-bold mb-16 text-center">Mitra Rumah BUMN</h4>

        @if ($mitra->isEmpty())
            <p class="text-center text-gray-500">Mitra Belum Ada</p>
        @else
            <div x-data="{}" x-init="$nextTick(() => {
                let ul = $refs.logos;
                ul.insertAdjacentHTML('afterend', ul.outerHTML);
                ul.nextSibling.setAttribute('aria-hidden', 'true');
            })"
                class="w-full inline-flex flex-nowrap overflow-hidden [mask-image:_linear-gradient(to_right,transparent_0,_black_128px,_black_calc(100%-128px),transparent_100%)]">
                <ul x-ref="logos"
                    class="flex items-center justify-center md:justify-start [&_li]:mx-8 [&_img]:max-w-none animate-infinite-scroll">
                    @foreach ($mitra as $m)
                        <li>
                            <a href="{{ $m->link }}">
                                <img src="{{ $m->logo }}" class="w-full" alt="{{ $m->nama_mitra }}">
                            </a>
                        </li>
                    @endforeach
                </ul>
                <ul x-ref="logos"
                    class="flex items-center justify-center md:justify-start [&_li]:mx-8 [&_img]:max-w-none animate-infinite-scroll">
                    @foreach ($mitra as $m)
                        <li>
                            <a href="{{ $m->link }}">
                                <img src="{{ $m->logo }}" class="w-full" alt="{{ $m->nama_mitra }}">
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif

    </div>
</div>
