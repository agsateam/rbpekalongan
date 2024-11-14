@extends('layouts.admin')
@section('title', 'Fungsi Rumah BUMN')
@section('content')

    <div class="flex flex-wrap gap-4">
        @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-300" role="alert">
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="flex flex-col md:flex-row justify-between w-full">
            <h4 class="text-2xl md:text-3xl font-bold mb-5">Fungsi</h4>
            <div class="breadcrumbs text-sm">
                <ul>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li>Web Content</li>
                    <li>Fungsi</li>
                </ul>
            </div>
        </div>

        @foreach ($fungsirb as $f)
            <a href="{{ route('webcontent.fungsiedit', $f->id) }}"
                class="grid grid-cols-1 md:grid-cols-3 items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row w-full p-2">
                <div class="col-span-2 grid grid-cols-5 gap-2">
                    @foreach (range(1, 5) as $i)
                        @php $foto = 'foto'.$i; @endphp
                        @if ($f->$foto)
                            <img class="object-cover h-full w-full rounded-md"
                                src="{{ $f->$foto }}" alt="Foto fungsi {{ $i }}">
                        @else
                            <img class="object-cover h-full w-full rounded-md"
                                src="{{ url('images/preview-image.jpg') }}">
                        @endif
                    @endforeach
                </div>
                <h5 class="text-xl font-bold text-gray-900 md:px-5 mt-2 md:mt-0">
                    {{ $f->nama_fungsi }}
                </h5>
            </a>
        @endforeach
    </div>

@endsection
