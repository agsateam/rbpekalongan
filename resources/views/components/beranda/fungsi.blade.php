<div class="bg-[#195770] my-16 py-28">
    <div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto rounded-lg flex flex-col text-white">
        <div class="text-4xl font-extrabold">PERAN RUMAH BUMN</div>
    </div>

    <div class="wrap flex overflow-x-scroll gap-10 p-5" id="scrollable-container">
        @foreach ($fungsi1 as $f1)
            <div class="card bg-white flex-shrink-0 w-3/4 p-5">
                <h3 class="text-4xl font-bold mb-4">PENGEMBANGAN UMKM</h3>
                <div class="flex flex-row gap-1">
                    <div class="w-1/4"><img src="./images/fungsi/fungsi1.jpg" alt=""></div>
                    <div class="flex flex-col w-3/4 px-3">
                        <div class="flex flex-row 2xl:justify-between">
                            <div class="w-40">
                                <img src="{{ $f1->foto1 }}" class="aspect-square">
                            </div>
                            <div class="w-40">
                                <img src="{{ $f1->foto2 }}" class="aspect-square">
                            </div>
                            <div class="w-40">
                                <img src="{{ $f1->foto3 }}" class="aspect-square">
                            </div>
                            <div class="w-40">
                                <img src="{{ $f1->foto4 }}" class="aspect-square">
                            </div>
                            <div class="w-40">
                                <img src="{{ $f1->foto5 }}" class="aspect-square">
                            </div>
                        </div>
                        <div class="mt-4 w-full">
                            {{ $f1->deskripsi }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach



        @foreach ($fungsi2 as $f2)
            <div class="card bg-white flex-shrink-0 w-3/4 p-5">
                <h3 class="text-4xl font-bold mb-4">BASECAMP MILENIAL</h3>
                <div class="flex flex-row gap-1">
                    <div class="w-1/4"><img src="./images/fungsi/fungsi1.jpg" alt=""></div>
                    <div class="flex flex-col w-3/4 px-3">
                        <div class="flex flex-row 2xl:justify-between">
                            <div class="w-40">
                                <img src="{{ $f2->foto1 }}" class="aspect-square">
                            </div>
                            <div class="w-40">
                                <img src="{{ $f2->foto2 }}" class="aspect-square">
                            </div>
                            <div class="w-40">
                                <img src="{{ $f2->foto3 }}" class="aspect-square">
                            </div>
                            <div class="w-40">
                                <img src="{{ $f2->foto4 }}" class="aspect-square">
                            </div>
                            <div class="w-40">
                                <img src="{{ $f2->foto5 }}" class="aspect-square">
                            </div>
                        </div>
                        <div class="mt-4 w-full">
                            {{ $f2->deskripsi }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @foreach ($fungsi3 as $f3)
            <div class="card bg-white flex-shrink-0 w-3/4 p-5">
                <h3 class="text-4xl font-bold mb-4">COWORKING SPACE</h3>
                <div class="flex flex-row gap-1">
                    <div class="w-1/4"><img src="./images/fungsi/fungsi1.jpg" alt=""></div>
                    <div class="flex flex-col w-3/4 px-3">
                        <div class="flex flex-row 2xl:justify-between">
                            <div class="w-40">
                                <img src="{{ $f3->foto1 }}" class="aspect-square">
                            </div>
                            <div class="w-40">
                                <img src="{{ $f3->foto2 }}" class="aspect-square">
                            </div>
                            <div class="w-40">
                                <img src="{{ $f3->foto3 }}" class="aspect-square">
                            </div>
                            <div class="w-40">
                                <img src="{{ $f3->foto4 }}" class="aspect-square">
                            </div>
                            <div class="w-40">
                                <img src="{{ $f3->foto5 }}" class="aspect-square">
                            </div>
                        </div>
                        <div class="mt-4 w-full">
                            {{ $f3->deskripsi }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @foreach ($fungsi4 as $f4)
            <div class="card bg-white flex-shrink-0 w-3/4 p-5">BENCANA</h3>
                <div class="flex flex-row gap-1">
                    <div class="w-1/4"><img src="./images/fungsi/fungsi1.jpg" alt=""></div>
                    <div class="flex flex-col w-3/4 px-3">
                        <div class="flex flex-row 2xl:justify-between">
                            <div class="w-40">
                                <img src="{{ $f4->foto1 }}" class="aspect-square">
                            </div>
                            <div class="w-40">
                                <img src="{{ $f4->foto2 }}" class="aspect-square">
                            </div>
                            <div class="w-40">
                                <img src="{{ $f4->foto3 }}" class="aspect-square">
                            </div>
                            <div class="w-40">
                                <img src="{{ $f4->foto4 }}" class="aspect-square">
                            </div>
                            <div class="w-40">
                                <img src="{{ $f4->foto5 }}" class="aspect-square">
                            </div>
                        </div>
                        <div class="mt-4 w-full">
                            {{ $f4->deskripsi }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @foreach ($fungsi5 as $f5)
            <div class="card bg-white flex-shrink-0 w-3/4 p-5">
                <h3 class="text-4xl font-bold mb-4">PENYALURAN PK/BL & KUR</h3>
                <div class="flex flex-row gap-1">
                    <div class="w-1/4"><img src="./images/fungsi/fungsi1.jpg" alt=""></div>
                    <div class="flex flex-col w-3/4 px-3">
                        <div class="flex flex-row 2xl:justify-between">
                            <div class="w-40">
                                <img src="{{ $f5->foto1 }}" class="aspect-square">
                            </div>
                            <div class="w-40">
                                <img src="{{ $f5->foto2 }}" class="aspect-square">
                            </div>
                            <div class="w-40">
                                <img src="{{ $f5->foto3 }}" class="aspect-square">
                            </div>
                            <div class="w-40">
                                <img src="{{ $f5->foto4 }}" class="aspect-square">
                            </div>
                            <div class="w-40">
                                <img src="{{ $f5->foto5 }}" class="aspect-square">
                            </div>
                        </div>
                        <div class="mt-4 w-full">
                            {{ $f5->deskripsi }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        @foreach ($fungsi1 as $f1)
            <div class="card bg-white flex-shrink-0 w-3/4 p-5">
                <h3 class="text-4xl font-bold mb-4">PENGEMBANGAN UMKM</h3>
                <div class="flex flex-row gap-1">
                    <div class="w-1/4"><img src="./images/fungsi/fungsi1.jpg" alt=""></div>
                    <div class="flex flex-col w-3/4 px-3">
                        <div class="flex flex-row 2xl:justify-between">
                            <div class="w-40">
                                <img src="{{ $f1->foto1 }}" class="aspect-square">
                            </div>
                            <div class="w-40">
                                <img src="{{ $f1->foto2 }}" class="aspect-square">
                            </div>
                            <div class="w-40">
                                <img src="{{ $f1->foto3 }}" class="aspect-square">
                            </div>
                            <div class="w-40">
                                <img src="{{ $f1->foto4 }}" class="aspect-square">
                            </div>
                            <div class="w-40">
                                <img src="{{ $f1->foto5 }}" class="aspect-square">
                            </div>
                        </div>
                        <div class="mt-4 w-full">
                            {{ $f1->deskripsi }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>



</div>

<script>
    const container = document.getElementById('scrollable-container');
    let isDown = false;
    let startX;
    let scrollLeft;

    container.addEventListener('mousedown', (e) => {
        isDown = true;
        container.classList.add('active');
        startX = e.pageX - container.offsetLeft;
        scrollLeft = container.scrollLeft;
    });

    container.addEventListener('mouseleave', () => {
        isDown = false;
        container.classList.remove('active');
    });

    container.addEventListener('mouseup', () => {
        isDown = false;
        container.classList.remove('active');
    });

    container.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - container.offsetLeft;
        const walk = (x - startX) * 2; // scroll-fast
        container.scrollLeft = scrollLeft - walk;
    });
</script>
