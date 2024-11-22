@extends('layouts.admin')
@section('title', 'Statistik')
@section('content')

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">



        <div class="flex flex-col md:flex-row justify-between">
            <h4 class="text-2xl md:text-3xl font-bold mb-5">Statistik</h4>
            <div class="breadcrumbs text-sm">
                <ul>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li>Web Content</li>
                    <li>Statistik</li>
                </ul>
            </div>
        </div>


        @include('components.backend.alert')



        <div class="flex flex-wrap justify-center items-center p-4 gap-4">

            {{-- GOdigital --}}
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow">

                <div class="flex flex-col items-center p-4">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="../images/informasi/statistik-1.png"
                        alt="statistik" />
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $godigital }}</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Go Digital</span>

                    <div class="flex mt-4 md:mt-6">

                        <a href="{{ route('webcontent.statistik.getdata', 1) }}"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Lihat
                            Detail</a>

                    </div>
                </div>
            </div>

            {{-- GoModern --}}
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow">

                <div class="flex flex-col items-center p-4">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="../images/informasi/statistik-2.png"
                        alt="statistik" />
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $gomodern }}</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Go Modern</span>

                    <div class="flex mt-4 md:mt-6">

                        <a href="{{ route('webcontent.statistik.getdata', 2) }}"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Lihat
                            Detail</a>

                    </div>
                </div>
            </div>

            {{-- GoOnline --}}
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow">

                <div class="flex flex-col items-center p-4">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="../images/informasi/statistik-3.png"
                        alt="statistik" />
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $goonline }}</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Go Online</span>

                    <div class="flex mt-4 md:mt-6">

                        <a href="{{ route('webcontent.statistik.getdata', 3) }}"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Lihat
                            Detail</a>

                    </div>
                </div>
            </div>

            {{-- Event --}}
            <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow">

                <div class="flex flex-col items-center p-4">
                    <img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="../images/informasi/statistik-4.png"
                        alt="statistik" />
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">{{ $jumlahevent }}</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">Jumlah Event</span>

                    <div class="flex mt-4 md:mt-6">

                        {{-- <a href="{{ route('webcontent.statistik.getdata', 4) }}"
                            class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300">Lihat
                            Detail</a> --}}

                    </div>
                </div>
            </div>




        </div>

    </div>


@endsection
