<div class="bg-[#195770] my-16 py-28">
    <div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto">
        <div class="flex flex-col lg:flex-row w-full justify-between items-center">

            <div class="text-white font-bold text-3xl text-center md:text-left md:text-5xl mb-8 lg:mb-0 w-1/2 line">
                <h3 class="leading-normal" data-aos="fade-right" data-aos-duration="3000">Informasi Pembinaan Rumah BUMN
                </h3>

            </div>

            <div class="text-white grid grid-cols-1 md:grid-cols-2 gap-16" data-aos="fade-left" data-aos-duration="3000">

                @php
                    $no = 1;
                @endphp

                @foreach ($statistik as $s)
                    <div class="card flex flex-row items-center gap-4">

                        <img class="w-16 h-16 mb-3 rounded-full shadow-lg"
                            src="../images/informasi/statistik-{{ $no++ }}.png" alt="statistik" />

                        <div class="">
                            @if ($s->jenis_statistik == 'Jumlah Event')
                                <h2 class="font-semibold text-2xl">{{ $jumlahevent }}</h2>
                            @else
                                <h2 class="font-semibold text-2xl">{{ $s->jumlah }}</h2>
                            @endif
                            <p>{{ $s->jenis_statistik }}</p>
                        </div>
                    </div>
                @endforeach


            </div>
        </div>
    </div>
</div>
