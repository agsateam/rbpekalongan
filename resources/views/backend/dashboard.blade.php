@php
    $roomNames = json_decode($charts)->bookingTopRoom->rooms;
    $roomsSeries = collect(json_decode($charts)->bookingTopRoom->series)->sortDesc();
@endphp

@extends('layouts.admin')
@section('title', 'Dashboard')

@section('head')
<script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
@endsection

@section('content')

<div class="md:px-5 mb-20">
    <div class="flex flex-col md:flex-row justify-between">
        <h4 class="text-2xl md:text-3xl font-bold mb-5">Dashboard</h4>
        <div class="breadcrumbs text-sm">
            <ul>
                <li>Dashboard</li>
            </ul>
        </div>
    </div>

    @include('components.backend.alert')
    
    <div class="grid grid-cols-2 md:grid-cols-4 gap-3 mt-5">
        <a href="{{route('manage.event')}}" class="flex bg-[#195770] text-white rounded-md px-5 md:px-8 py-5 items-center gap-5">
            <span class="text-2xl md:text-4xl font-bold text-center">{{$stats["upcomingEvent"]}}</span>
            <div class="flex flex-col font-semibold text-sm md:text-base">
                <span>Upcoming</span>
                <span>Event</span>
            </div>
        </a>
        <a href="{{route('manage.umkm')}}" class="flex bg-[#195770] text-white rounded-md px-5 md:px-8 py-5 items-center gap-5">
            <span class="text-2xl md:text-4xl font-bold text-center">{{$stats["umkmRegistered"]}}</span>
            <div class="flex flex-col font-semibold text-sm md:text-base">
                <span>UMKM</span>
                <span>Terdaftar</span>
            </div>
        </a>
        <a href="{{route('manage.room')}}" class="flex bg-[#195770] text-white rounded-md px-5 md:px-8 py-5 items-center gap-5">
            <span class="text-2xl md:text-4xl font-bold text-center">{{$stats["bookingRoom"]}}</span>
            <div class="flex flex-col font-semibold text-sm md:text-base">
                <span>Ruang</span>
                <span>Booking</span>
            </div>
        </a>
        <a href="{{route('manage.fasilitator')}}" class="flex bg-[#195770] text-white rounded-md px-5 md:px-8 py-5 items-center gap-5">
            <span class="text-2xl md:text-4xl font-bold text-center">{{$stats["facilitators"]}}</span>
            <div class="flex flex-col font-semibold text-sm md:text-base">
                <span>Fasilitator</span>
            </div>
        </a>
    </div>

    <input type="hidden" value="{{$charts}}" id="chartDatas">

    <div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-10">
        <div class="md:col-span-2 flex flex-col border-2 border-[#195770] rounded-md px-5 py-3">
            <div class="flex justify-between h-8 mb-5">
                <span class="text-sm md:text-lg font-semibold">Grafik Jumlah Booking Bulanan</span>
                <select
                    class='w-fit h-full p-0 rounded-sm focus:ring-0 focus:border-[#195770] border-gray-300 px-2'
                    onchange="bookingYearlyUpdate(this.value)"
                >
                    @for ($i = 0; $i < 5; $i++)
                        <option value="{{ intval(date("Y"))-$i }}">{{ intval(date("Y"))-$i }}</option>
                    @endfor
                </select>
            </div>
            <div id="bookingYearlyChart"></div>
        </div>
        <div class="flex flex-col border-2 border-[#195770] rounded-md px-5 py-3">
            <div class="flex flex-col gap-1 mb-5">
                <span class="text-sm md:text-lg font-semibold">Top Booking Room</span>
                <input
                    type="month"
                    max="{{date("Y-m")}}"
                    class='w-full h-full p-0 rounded-sm focus:ring-0 focus:border-[#195770] border-gray-300 px-2'
                    onchange="bookingTopRoomUpdate(this.value)"
                />
            </div>
            <div id="bookingTopRoomChart"></div>
            <div class="flex flex-col text-sm mt-5" id="bookingTopRoomList">
                @foreach ($roomsSeries as $index => $r)
                    <div class="flex justify-between">
                        <span>{{$roomNames[$index]}}</span>        
                        <span>{{$r}}</span>        
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script>
    var chartDatas = JSON.parse(document.querySelector("#chartDatas").value);

    function chartBookingYearly(series, months){
        var options = {
            chart: {
                type: 'line',
            },
            series: [{
                name: 'Jumlah Booking',
                data: series
            }],
            xaxis: {
                categories: months
            }
        }
    
        var chart = new ApexCharts(document.querySelector("#bookingYearlyChart"), options);
        chart.render();
    }
    chartBookingYearly(chartDatas.bookingYearly.series, chartDatas.bookingYearly.months);

    function chartBookingTopRoom(series, rooms){
        var options = {
            series: series,
            chart: {
                type: 'pie'
            },
            labels: rooms,
            legend: {show: false},
        };

        var chart = new ApexCharts(document.querySelector("#bookingTopRoomChart"), options);
        chart.render();
    }
    chartBookingTopRoom(chartDatas.bookingTopRoom.series, chartDatas.bookingTopRoom.rooms);


    // update data
    async function bookingYearlyUpdate(value){
        const endpoint = "{{route('api.booking.yearly')}}" +"/"+ value;

        try {
            const response = await fetch(endpoint);
            if (!response.ok) {
                throw new Error(`Response status: ${response.status}`);
            }

            const json = await response.json();
            document.querySelector("#bookingYearlyChart").innerHTML = "";
            chartBookingYearly(json.series, json.months);
        } catch (error) {
            console.error(error.message);
        }
    }

    async function bookingTopRoomUpdate(value){
        const endpoint = "{{route('api.booking.toproom')}}" +"/"+ value;

        try {
            const response = await fetch(endpoint);
            if (!response.ok) {
                throw new Error(`Response status: ${response.status}`);
            }

            const json = await response.json();
            const countData = json.series.reduce((total, item) => total + item, 0);
            
            if (countData > 0) {
                document.querySelector("#bookingTopRoomChart").classList.remove("hidden");
                document.querySelector("#bookingTopRoomChart").innerHTML = "";
                chartBookingTopRoom(json.series, json.rooms);

                document.querySelector("#bookingTopRoomList").innerHTML = "";
                const list = json.list.sort((a, b) => b.count - a.count);
                list.forEach((item) => {
                    return document.querySelector("#bookingTopRoomList").innerHTML += "<div class='flex justify-between'><span>"+item.room+"</span><span>"+item.count+"</span></div>";
                });
            } else {
                document.querySelector("#bookingTopRoomChart").classList.add("hidden");
                document.querySelector("#bookingTopRoomList").innerHTML = "<span class='text-sm'>Tidak ada data di periode ini.</span>";
            }
            
        } catch (error) {
            console.error(error.message);
        }
    }
</script>
@endsection