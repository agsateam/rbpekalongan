@extends('layouts.admin')
@section('title', 'Ubah Ruang')

@section('content')
<div class="md:px-5">
    <div class="flex flex-col md:flex-row justify-between">
        <h4 class="text-2xl md:text-3xl font-bold mb-5">Ubah Ruang</h4>
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li>Booking</li>
                <li>Ruang</li>
                <li>Ubah</li>
            </ul>
        </div>
    </div>

    @include('components.backend.alert')

    <div class="flex justify-end">
        <button onclick="history.back()" class="px-4 py-1 bg-gray-500 text-white rounded-md mt-3">Kembali</button>
    </div>
    <div class="flex flex-col border rounded-md p-5 mt-2">
        <form class="grid grid-cols-1 md:grid-cols-2 gap-2" action="{{route('manage.room.update')}}" method="post">
            @csrf
            <input type="hidden" name="id" value="{{$data->id}}">
            <label class="form-control w-full md:col-span-2">
                <div class="label">
                    <span class="label-text text-base font-semibold">Nama Ruangan <span class="text-red-600 font-bold">*</span></span>
                </div>
                <input
                    type="text"
                    name="name"
                    placeholder="Ruang..."
                    value="{{$data->name}}"
                    class="input input-bordered w-full"
                    required
                />
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text text-base font-semibold">Jumlah Kursi <span class="text-red-600 font-bold">*</span></span>
                </div>
                <input
                    type="number"
                    name="seat"
                    min="1"
                    value="{{$data->seat}}"
                    class="input input-bordered w-full"
                    required
                />
            </label>
            <label class="form-control w-full">
                <div class="label">
                    <span class="label-text text-base font-semibold">Full Booking <span class="text-red-600 font-bold">*</span></span>
                </div>
                <select name="isMustFullBooking" class="input input-bordered w-full" required>
                    <option value="1" {{$data->isMustFullBooking == 1 ? 'selected' : ''}}>Ya</option>
                    <option value="0" {{$data->isMustFullBooking == 0 ? 'selected' : ''}}>Tidak</option>
                </select>
            </label>
            <button type="submit" class="btn bg-[#195770] text-white md:col-span-2 mt-5">Simpan</button>
        </form>
    </div>
</div>
@endsection