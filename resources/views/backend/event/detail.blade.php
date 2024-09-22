@extends('layouts.admin')
@section('title', 'Detail Event')
@section('content')
<div class="md:px-5">
    <div class="flex justify-between">
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

    <div class="flex flex-col border rounded-md p-5 mt-5">
        <div class="grid grid-cols-1 md:grid-cols-5 gap-2 md:gap-5">
            <div class="flex flex-col">
                <span class="font-semibold text-gray-500">Nama Event</span>
                <span class="text-xl font-bold">{{ $data->name }}</span>
            </div>
            <div class="flex flex-col md:items-center">
                <span class="font-semibold text-gray-500">Tanggal</span>
                <span class="text-xl font-bold">{{ $data->date }}</span>
            </div>
            <div class="flex flex-col md:items-center">
                <span class="font-semibold text-gray-500">Waktu</span>
                <span class="text-xl font-bold">{{ $data->time }}</span>
            </div>
            <div class="flex flex-col">
                <span class="font-semibold text-gray-500">Lokasi</span>
                <span class="text-xl font-bold">{{ $data->location }}</span>
            </div>
            <div class="flex flex-col md:items-center">
                <span class="font-semibold text-gray-500">Status</span>
                <span class="text-xl font-bold">{{ $data->status == "done" ? "Selesai" : "Upcoming" }}</span>
            </div>
        </div>

        <span class="mt-8 text-xl">Daftar Registrasi Event</span>
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
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($participants as $i)
                        <tr>
                            <td>{{$i['name']}}</td>
                            <td>{{$i['gender']}}</td>
                            <td>{{$i['age']}}</td>
                            <td>{{$i['number']}}</td>
                            <td>{{$i['address']}}</td>
                            <td>{{$i['is_have_umkm'] ? $i['umkm'] : "-"}}</td>
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
  <div class="modal-box">
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

<script>
    const modalDone = document.getElementById('modal_done');
    function done(id){
        modalDone.showModal();
        document.getElementById('event_id').value = id;
    }
</script>
@endsection