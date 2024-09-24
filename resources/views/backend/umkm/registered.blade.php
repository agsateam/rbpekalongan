@extends('layouts.admin')
@section('title', 'Pendaftaran UMKM')
@section('content')

<div class="md:px-5">
    <div class="flex flex-col md:flex-row justify-between">
        <h4 class="text-2xl md:text-3xl font-bold mb-5">Pendaftaran UMKM</h4>
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li>UMKM</li>
                <li>Pendaftaran</li>
            </ul>
        </div>
    </div>

    <div class="mt-10 mb-5">
        @include('components.backend.alert')
    </div>

    <div class="overflow-x-auto">
        <table class="w-full table table-auto border border-gray-200 rounded-md ">
            <thead class="bg-gray-100">
                <tr>
                    <th class="py-3 text-left font-medium uppercase">UMKM</th>
                    <th class="py-3 text-left font-medium uppercase">Owner</th>
                    <th class="py-3 text-left font-medium uppercase">HP/Whatsapp</th>
                    <th class="py-3 text-left font-medium uppercase">Fasilitator</th>
                    <th class="py-3 text-left font-medium uppercase">#</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @if (count($data) < 1)
                <tr>
                    <td colspan="5">Belum ada data</td>
                </tr>
                @endif
                @foreach ($data as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->owner}}</td>
                    <td>{{$item->phone}}</td>
                    <td>{{$item->fasilitator->name}}</td>
                    <td class="flex gap-1">
                        <button onclick="detail({{ json_encode($item) }})" class="btn btn-sm bg-[#195770] text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </button>
                        <button onclick="confirmAccept('{{ route('manage.umkm.accept') . '/' . $item->id }}')" class="btn btn-sm bg-emerald-600 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </button>
                        <button onclick="confirmReject('{{ route('manage.umkm.reject') . '/' . $item->id }}')" class="btn btn-sm bg-red-600 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection


@section('script')
<dialog id="modal_detail" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box pb-16 md:pb-8">
        <div class="w-full flex justify-between">
            <h3 class="text-lg font-bold">Detail UMKM</h3>
            <button type="button" onclick="modalDetail.close()" class="btn btn-sm bg-gray-500 text-white">Tutup</button>
        </div>
        <table class="table mt-5">
            <tr>
                <td>Nama UMKM</td>
                <td>:</td>
                <td id="umkm"></td>
            </tr>
            <tr>
                <td>Owner</td>
                <td>:</td>
                <td id="owner"></td>
            </tr>
            <tr>
                <td>HP/Whatsapp</td>
                <td>:</td>
                <td id="phone"></td>
            </tr>
            <tr>
                <td>NPWP</td>
                <td>:</td>
                <td id="npwp"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td id="address"></td>
            </tr>
            <tr>
                <td>Fasilitator yang dipilih</td>
                <td>:</td>
                <td id="mentor"></td>
            </tr>
            <tr>
                <td>Alasan/Harapan bergabung</td>
                <td>:</td>
                <td id="reason"></td>
            </tr>
            <tr>
                <td>Logo</td>
                <td>:</td>
                <td>
                    <img src="{{url('images/preview-image.jpg')}}" id="logo" class="w-1/2">
                </td>
            </tr>
        </table>
    </div>
</dialog>

{{-- Action Button --}}
<script>
    const modalDetail = document.getElementById('modal_detail');
    function detail(data){
        modalDetail.showModal();
        document.getElementById('umkm').innerHTML = data.name;
        document.getElementById('owner').innerHTML = data.owner;
        document.getElementById('phone').innerHTML = data.phone;
        document.getElementById('npwp').innerHTML = data.npwp;
        document.getElementById('address').innerHTML = data.address;
        document.getElementById('mentor').innerHTML = data.fasilitator.name;
        document.getElementById('reason').innerHTML = data.join_reason;
        document.getElementById('logo').src = data.logo;
    }

    function confirmReject(href){
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Tolak pendaftaran UMKM ini?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: "#195770",
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya',
        }).then((val) => {
            val['isConfirmed'] && (window.location.href = href)
        })
    }

    function confirmAccept(href){
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Terima pendaftaran UMKM ini?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: "#195770",
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya',
        }).then((val) => {
            val['isConfirmed'] && (window.location.href = href)
        })
    }
</script>
@endsection