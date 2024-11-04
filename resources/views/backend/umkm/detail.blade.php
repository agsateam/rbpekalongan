@extends('layouts.admin')
@section('title', 'Detail UMKM')
@section('content')
<div class="md:px-5">
    <div class="flex flex-col md:flex-row justify-between">
        <h4 class="text-2xl md:text-3xl font-bold mb-5">Detail UMKM</h4>
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li><a href="{{route('manage.umkm')}}">UMKM</a></li>
                <li>Detail</li>
            </ul>
        </div>
    </div>

    <div class="flex justify-between mt-5">
        <div>
            <a href="{{route('manage.umkm.edit') ."/". $data->id}}" class="btn btn-sm bg-[#195770] text-white">Ubah Data</a>
            <button onclick="confirmDelete('{{route('manage.umkm.delete')}}', '{{$data->id}}')" class="btn btn-sm bg-red-600 text-white">Hapus</button>
        </div>
        <a href="{{route('manage.umkm')}}" class="btn btn-sm bg-gray-500 text-white">Kembali</a>
    </div>

    @include('components.backend.alert')

    <div class="flex flex-col border rounded-md p-5 mt-5">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-2 md:gap-5">
            <div class="flex flex-col md:col-span-2">
                <span class="font-semibold text-gray-500">Nama Usaha</span>
                <span class="text-xl font-bold">{{ $data->name }}</span>
            </div>
            <div class="flex flex-col">
                <span class="font-semibold text-gray-500">Pemilik</span>
                <span class="text-xl font-bold">{{ $data->owner }}</span>
            </div>
            <div class="flex flex-col">
                <span class="font-semibold text-gray-500">Jenis Usaha</span>
                <span class="text-xl font-bold">{{ $data->type }}</span>
            </div>
            <div class="flex flex-col md:col-span-2">
                <span class="font-semibold text-gray-500">Alamat</span>
                <span class="text-xl font-bold">{{ $data->address }}</span>
            </div>
            <div class="flex flex-col">
                <span class="font-semibold text-gray-500">Nomor HP/Whatsapp</span>
                <span class="text-xl font-bold">{{ $data->phone }}</span>
            </div>
            <div class="flex flex-col">
                <span class="font-semibold text-gray-500">Fasilitator</span>
                <span class="text-xl font-bold">{{ $data->fasilitator->name }}</span>
            </div>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-5 gap-2 md:gap-10 mt-10 mb-10 pt-10 border-t">
            <div class="flex flex-col text-justify mt-5 md:mt-0">
                <span class="text-xl font-bold mb-2">Logo</span>
                <img src="{{$data->logo ?? url('images/noimage.jpg')}}" alt="Logo UMKM" class="rounded-md">
            </div>
            <div class="md:col-span-4 flex flex-col text-justify mt-5 md:mt-0">
                <span class="text-xl font-bold mb-2">Deskripsi Usaha</span>
                {{$data->desc}}
            </div>
        </div>
        {{-- <div class="flex justify-between items-center mt-10 mb-5 pt-10 border-t">
            <span class="text-xl font-bold">Produk</span>
            <a href="{{route('manage.product.add') ."?umkm=". $data->id}}" class="btn btn-sm bg-[#195770] text-white">Tambah Data Produk</a>
        </div>
        @if ($data->products->count() < 1)
            <span class="text-base">Belum ada produk.</span>
        @endif
        <div class="grid grid-cols-2 md:grid-cols-4 gap-2 md:gap-5">
            @foreach ($data->products as $item)
                <div class="flex flex-col border rounded-md shadow p-3">
                    <img src="{{$item->photo ?? url('images/noimage.jpg')}}" class="rounded-md">
                    <span class="text-base md:text-xl font-bold mt-3">{{$item->name}}</span>
                    <span class="text-base">Rp {{number_format($item->price)}}</span>
                </div>
            @endforeach
        </div> --}}
    </div>
</div>
@endsection

@section('script')
<script>
    function confirmDelete(route, id){
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Setelah dihapus data tidak dapat dikembalikan, yakin akan menghapus data UMKM ini?',
            icon: 'question',
            iconColor: 'red',
            showCancelButton: true,
            confirmButtonColor: "red",
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya',
        }).then((val) => {
            val['isConfirmed'] && (window.location.href = route + "/" + id)
        })
    }
</script>
@endsection