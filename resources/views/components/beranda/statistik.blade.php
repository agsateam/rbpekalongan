<div class="bg-[#195770] my-16 py-28">
    <div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto">
        <div class="flex flex-col lg:flex-row w-full justify-between items-center">

            <div class="text-white font-bold text-3xl text-center md:text-left md:text-5xl mb-8 lg:mb-0 w-1/2 line">
                <h3 class="leading-normal" data-aos="fade-up" data-aos-duration="3000">Informasi Pembinaan Rumah BUMN
                </h3>

            </div>

            <div class="text-white grid grid-cols-1 md:grid-cols-2 gap-16" data-aos="fade-left">
                @php
                    $no = 1;
                @endphp

                @foreach ($jenisstatistik as $s)
                    @php
                        $totalJumlah = $jumlahstatistik->firstWhere('jenis_statistiks_id', $s->id)?->total_jumlah ?? 0;
                    @endphp

                    <div class="card flex flex-row items-center gap-4">
                        <img class="w-16 h-16 mb-3 rounded-full shadow-lg"
                            src="../images/informasi/statistik-{{ $loop->iteration }}.png" alt="statistik" />

                        <div>
                            @if ($s->jenis_statistik == 'Jumlah Event')
                                <h2 class="font-semibold text-2xl">{{ $jumlahevent }}</h2>
                            @else
                                <h2 class="font-semibold text-2xl">{{ $totalJumlah }}</h2>
                            @endif
                            <p>{{ $s->jenis_statistik }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="flex flex-wrap w-full justify-between gap-4 mt-8">


            {{-- Go Digital --}}
            <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Go Digital</h3>
                <div id="statistik-chart"></div>
            </div>

            {{-- Go Modern --}}
            <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Go Modern</h3>
                <div id="statistik-modern-chart"></div>
            </div>

            {{-- Go Online --}}
            <div class="max-w-sm w-full bg-white rounded-lg shadow dark:bg-gray-800 p-4 md:p-6">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Go Online</h3>
                <div id="statistik-online-chart"></div>
            </div>
        </div>
    </div>
</div>

<script>
    async function fetchStatistik() {
        try {
            const response = await fetch('api/statistik');
            const data = await response.json();

            // Filter data untuk jenis_statistiks_id tertentu
            const digitalData = data.statistik.filter(item => item.jenis_statistiks_id === 1);
            const modernData = data.statistik.filter(item => item.jenis_statistiks_id === 2);
            const onlineData = data.statistik.filter(item => item.jenis_statistiks_id === 3);

            // Fungsi untuk konfigurasi grafik
            function renderChart(elementId, chartData, title) {
                const years = chartData.map(item => item.tahun);
                const jumlah = chartData.map(item => item.jumlah);

                const options = {
                    series: [{
                        name: 'Jumlah',
                        data: jumlah
                    }],
                    chart: {
                        type: 'line',
                        height: 320
                    },
                    xaxis: {
                        categories: years,
                        title: {
                            text: 'Tahun'
                        }
                    },
                    yaxis: {
                        title: {
                            text: 'Jumlah'
                        }
                    },
                    colors: ['#1A56DB'],
                    stroke: {
                        curve: 'smooth',
                        width: 2
                    },
                    markers: {
                        size: 4,
                        colors: ['#1A56DB']
                    },
                    tooltip: {
                        theme: 'dark'
                    }
                };

                const chart = new ApexCharts(document.querySelector(elementId), options);
                chart.render();
            }

            // Render masing-masing grafik
            renderChart("#statistik-chart", digitalData, 'Go Digital');
            renderChart("#statistik-modern-chart", modernData, 'Go Modern');
            renderChart("#statistik-online-chart", onlineData, 'Go Online');
        } catch (error) {
            console.error('Gagal mengambil data:', error);
        }
    }

    // Panggil fungsi fetch
    fetchStatistik();
</script>
