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
            <div class="form-control w-full">
                <div class="label">
                    <div class="label-text text-base font-semibold flex items-center">
                        Full Booking <span class="text-red-600 font-bold">*</span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 ml-1" data-popover-target="popover-booking">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Zm-9 5.25h.008v.008H12v-.008Z" />
                        </svg>
                    </div>
                    <div data-popover id="popover-booking" role="tooltip" class="absolute z-10 invisible inline-block w-64 text-sm text-white transition-opacity duration-300 bg-gray-600 rounded-lg shadow-sm opacity-0">
                        <div class="px-3 py-2">
                            <p>Ruangan hanya bisa dibooking secara full?</p>
                        </div>
                        <div data-popper-arrow></div>
                    </div>
                </div>
                <select name="isMustFullBooking" class="input input-bordered w-full" required>
                    <option value="1" {{$data->isMustFullBooking == 1 ? 'selected' : ''}}>Ya</option>
                    <option value="0" {{$data->isMustFullBooking == 0 ? 'selected' : ''}}>Tidak</option>
                </select>
            </div>
            <button type="submit" class="btn bg-[#195770] text-white md:col-span-2 mt-5">Simpan</button>
        </form>
    </div>
</div>
@endsection