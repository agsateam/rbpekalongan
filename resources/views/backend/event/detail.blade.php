@extends('layouts.admin')
@section('title', 'Detail Event')
@section('content')
<div class="md:px-5">
    <div class="flex flex-col md:flex-row justify-between">
        <h4 class="text-2xl md:text-3xl font-bold mb-5">Detail Event</h4>
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li><a href="{{route('manage.event')}}">Event</a></li>
                <li>Detail</li>
            </ul>
        </div>
    </div>

    <div class="flex justify-between mt-5">
        @if ($data->status != "done")
        <button class="btn btn-sm btn-success text-white" onclick="done('{{$data->id}}')">Tandai Selesai</button>
        @else
        <div></div>
        @endif
        <a href="{{route('manage.event')}}" class="btn btn-sm bg-gray-500 text-white">Kembali</a>
    </div>

    @include('components.backend.alert')

    <div class="flex flex-col border rounded-md p-5 mt-5">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-2 md:gap-5 border-b pb-5">
            <div class="flex flex-col md:col-span-2">
                <span class="font-semibold text-gray-500">Nama Event</span>
                <span class="text-xl font-bold">{{ $data->name }}</span>
            </div>
            <div class="flex flex-col">
                <span class="font-semibold text-gray-500">Tanggal</span>
                <span class="text-xl font-bold">{{ $data->date }}</span>
            </div>
            <div class="flex flex-col">
                <span class="font-semibold text-gray-500">Waktu</span>
                <span class="text-xl font-bold">{{ $data->time }}</span>
            </div>
            <div class="flex flex-col">
                <span class="font-semibold text-gray-500">Lokasi</span>
                <span class="text-xl font-bold">{{ $data->location }}</span>
            </div>
            <div class="flex flex-col">
                <span class="font-semibold text-gray-500">Status</span>
                <span class="text-xl font-bold">{{ $data->status == "done" ? "Selesai" : "Upcoming" }}</span>
                @if ($data->status == "done")
                    <span class="text-sm font-bold">{{ $data->participant }} Peserta</span>
                @endif
            </div>
        </div>

        @if ($data->status == "done")
        <span class="mt-8 text-xl">Daftar Peserta</span>
        @else
        <span class="mt-8 text-xl">Daftar Registrasi Event</span>
        @endif

        <div class="w-full overflow-x-auto">
            <table id="participant-table" class="w-full table table-auto border border-gray-200 rounded-md mt-3">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="py-3 text-left font-medium uppercase">Nama</th>
                        <th class="py-3 text-left font-medium uppercase">Gender</th>
                        <th class="py-3 text-left font-medium uppercase">Umur</th>
                        <th class="py-3 text-left font-medium uppercase">Nomor HP/WA</th>
                        <th class="py-3 text-left font-medium uppercase">Alamat</th>
                        <th class="py-3 text-left font-medium uppercase">UMKM</th>
                        {{-- <th class="py-3 text-left font-medium uppercase">IG</th>
                        <th class="py-3 text-left font-medium uppercase">Email</th> --}}
                        @if ($data->status == "upcoming")
                        <th class="py-3 text-left font-medium uppercase">Status</th>
                        @endif
                        <th class="py-3 text-left font-medium uppercase">#</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($participants as $i)
                        <tr>
                            <td>{{$i['name']}}</td>
                            <td>{{ $i['gender'] == 'lk' ? "LK" : "PR" }}</td>
                            <td>{{$i['age']}}</td>
                            <td>{{$i['phone']}}</td>
                            <td>{{$i['address']}}</td>
                            <td>{{$i['is_have_umkm'] ? $i['umkm'] : "-"}}</td>
                            {{-- <td>{{$i['instagram'] ?? "-"}}</td>
                            <td>{{$i['email'] ?? "-"}}</td> --}}
                            @if ($data->status == "upcoming")
                            <td>@include('components.backend.registration.status', ["data" => $i])</td>
                            @endif
                            <td>
                                <div class="flex gap-1">
                                    <button
                                        onclick="detail(
                                            '{{ $i['name'] }}',
                                            '{{ $i['gender'] }}',
                                            '{{ $i['age'] }}',
                                            '{{ $i['phone'] }}',
                                            '{{ $i['address'] }}',
                                            '{{ $i['umkm'] }}',
                                            '{{ $i['instagram'] }}',
                                            '{{ $i['email'] }}',
                                        )"
                                        class="btn btn-sm bg-[#195770] text-white"
                                    >
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                        </svg>
                                    </button>
                                    @if ($data->status == "upcoming")
                                    <button onclick="confirmAccept('{{ route('manage.eventregist.accept') . '/' . $data->id }}')" class="btn btn-sm bg-emerald-600 text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </button>
                                    <button onclick="confirmReject('{{ route('manage.eventregist.reject') . '/' . $data->id }}')" class="btn btn-sm bg-red-600 text-white">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </button>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<dialog id="modal_done" class="modal modal-bottom sm:modal-middle">
  <div class="modal-box pb-16 md:pb-8">
    <h3 class="text-lg font-bold">Selesaikan Event</h3>
    <p class="pt-4">Tandai event ini sebagai selesai.</p>
    <form method="post" action="{{route('manage.event.done')}}">
        @csrf
        <input type="number" name="participant" class="input input-bordered w-full mt-3" placeholder="Jumlah Peserta" required>
        <input type="hidden" name="id" id="event_id">
        <div class="modal-action">
            <button type="submit" class="btn bg-[#195770] text-white">Simpan</button>
            <button type="button" onclick="modalDone.close()" class="btn bg-gray-500 text-white">Batal</button>
        </div>
    </form>
  </div>
</dialog>

<dialog id="modal_detail" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box pb-16 md:pb-8">
        <div class="w-full flex justify-between">
            <h3 class="text-lg font-bold">Detail Pendaftar</h3>
            <button type="button" onclick="modalDetail.close()" class="btn btn-sm bg-gray-500 text-white">Tutup</button>
        </div>
        <table class="table mt-5">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td id="nama"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td id="gender"></td>
            </tr>
            <tr>
                <td>Umur</td>
                <td>:</td>
                <td id="umur"></td>
            </tr>
            <tr>
                <td>Nomor HP/WA</td>
                <td>:</td>
                <td id="phone"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td id="alamat"></td>
            </tr>
            <tr>
                <td>UMKM</td>
                <td>:</td>
                <td id="umkm"></td>
            </tr>
            <tr>
                <td>Instagran</td>
                <td>:</td>
                <td id="ig"></td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td id="email"></td>
            </tr>
        </table>
    </div>
</dialog>

<script>
    const modalDone = document.getElementById('modal_done');
    function done(id){
        modalDone.showModal();
        document.getElementById('event_id').value = id;
    }
</script>

{{-- Action Button --}}
<script>
    const modalDetail = document.getElementById('modal_detail');
    function detail(nama, jk, umur, phone, alamat, umkm, ig, email){
        modalDetail.showModal();
        document.getElementById('nama').innerHTML = nama;
        document.getElementById('gender').innerHTML = (jk == 'lk') ? 'Laki-Laki' : 'Perempuan';
        document.getElementById('umur').innerHTML = umur;
        document.getElementById('phone').innerHTML = phone;
        document.getElementById('alamat').innerHTML = alamat;
        document.getElementById('umkm').innerHTML = (umkm == "") ? "-" : umkm;
        document.getElementById('ig').innerHTML = (ig == "") ? "-" : ig;
        document.getElementById('email').innerHTML = (email == "") ? "-" : email;
    }

    function confirmReject(href){
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Tolak pendaftaran ini?',
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
            text: 'Terima pendaftaran ini?',
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