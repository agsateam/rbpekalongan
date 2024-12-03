<div class="bg-[#195770] my-16 py-28">
    <div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto">
        <div class="flex flex-col lg:flex-row w-full justify-between items-center md:items-start">

            <div class="text-white font-bold text-2xl text-center md:text-left md:text-5xl mb-8 lg:mb-0 md:w-1/2 line">
                <h3 class="leading-normal" data-aos="fade-up">Informasi Pembinaan Rumah BUMN</h3>
            </div>

            <div class="text-white grid grid-cols-1 md:grid-cols-2 gap-8" data-aos="fade-up">
                @php
                    $no = 1;
                @endphp

                @foreach ($jenisstatistik as $s)
                    @php
                        $totalJumlah = $jumlahstatistik->firstWhere('jenis_statistiks_id', $s->id)?->total_jumlah ?? 0;
                    @endphp

                    <div class="card flex flex-row items-center gap-4">
                        <img class="w-16 h-16 rounded-full shadow-lg"
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

        <div class="w-full flex flex-col md:flex-row justify-between gap-5 mt-12">
            {{-- Go Digital --}}
            <div class="w-full bg-white rounded-lg shadow p-4 md:p-6" data-aos="fade-up" data-aos-duration="1000">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Go Digital</h3>
                <div id="statistik-chart"></div>
            </div>

            {{-- Go Modern --}}
            <div class="w-full bg-white rounded-lg shadow p-4 md:p-6" data-aos="fade-up" data-aos-duration="1500">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Go Modern</h3>
                <div id="statistik-modern-chart"></div>
            </div>

            {{-- Go Online --}}
            <div class="w-full bg-white rounded-lg shadow p-4 md:p-6" data-aos="fade-up" data-aos-duration="2000">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Go Online</h3>
                <div id="statistik-online-chart"></div>
            </div>
        </div>
    </div>
</div>

<script>
    async function fetchStatistik() {
        try {
            // Ambil data dari API
            const response = await fetch('api/statistik');
            const data = await response.json();


            const statistikGroups = {
                digital: calculateCumulativeData(filterDataByType(data.statistik, 1)),
                modern: calculateCumulativeData(filterDataByType(data.statistik, 2)),
                online: calculateCumulativeData(filterDataByType(data.statistik, 3)),
            };



            renderChart("#statistik-chart", statistikGroups.digital, 'Go Digital');
            renderChart("#statistik-modern-chart", statistikGroups.modern, 'Go Modern');
            renderChart("#statistik-online-chart", statistikGroups.online, 'Go Online');
        } catch (error) {
            console.error('Gagal mengambil data:', error);
        }
    }


    function filterDataByType(data, typeId) {
        return data.filter(item => item.jenis_statistiks_id === typeId);
    }

    function calculateCumulativeData(data) {
        let cumulativeTotal = 0;
        return data.map(item => {
            cumulativeTotal += item.jumlah;
            return {
                tahun: item.tahun,
                total: cumulativeTotal,
            };
        });
    }

    function renderChart(elementId, chartData, title) {
        const years = chartData.map(item => item.tahun);
        const totals = chartData.map(item => item.total);

        const options = {
            series: [{
                name: 'Jumlah',
                data: totals
            }],
            chart: {
                type: 'bar',
                height: 320,

            },
            dataLabels: {
                enabled: false
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
            colors: ['#195770'],
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

    fetchStatistik();
</script>
