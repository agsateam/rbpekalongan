{{-- @php
    function getRoomName($id, $room){
        $data = collect($room)->where('id', $id);
        $result = $data->first();

        return $result["name"];
    }

    function getRoomReadySeat($id, $room){
        $data = collect($room)->where('id', $id);
        $result = $data->first();

        return $result["kursi"] - $result["booked"];
    }
@endphp --}}

@extends('layouts.master')
@section('title', 'Booking')

@section('content')
<div class="py-16">
    <div class="max-w-screen-xl mx-8 md:mx-14 2xl:mx-auto">
        <div class="flex justify-center items-center mb-5">
            <h4 class="text-2xl md:text-5xl font-bold">Booking Ruangan</h4>
        </div>

        <div class="flex justify-center md:pt-5">
            <div class="flex flex-col md:w-3/4">

                <img src="{{url('images/denah.jpg')}}"/>
                <div class="flex mt-5">
                    <select class="select select-bordered w-full" id="ruang">
                        <option value="null" disabled selected>Pilih Ruangan</option>
                        @foreach ($room as $item)
                            <option value="{{$item['id']."|".$item['name']."|".($item['kursi']-$item['booked'])}}">{{$item['name']}}</option>
                        @endforeach
                    </select>
                    <button
                        class="px-5 py-1 text-sm md:text-base bg-[#195770] text-white rounded-md ml-2"
                        onclick="booking()"
                    >Booking</button>
                </div>

                <form id="form-booking" method="post" action="{{route('booking.send')}}" class="hidden grid-cols-1 md:grid-cols-2 gap-3 border-t pt-3 mt-10">
                    @csrf
                    <input type="hidden" id="room_id"/>
                    <div class="text-3xl font-bold md:col-span-2">Form Booking Ruangan</div>
                    
                    <label class="form-control w-full">
                        <div class="label">
                          <span class="label-text text-base font-semibold">Ruangan</span>
                        </div>
                        <input type="text" class="input input-bordered" id="room_name" readonly/>
                    </label>
                    <label class="form-control w-full">
                        <div class="label flex justify-between">
                          <span class="label-text text-base font-semibold">Jumlah Kursi <span class="text-red-600 font-bold">*</span></span>
                          <div>
                              <span class="label-text text-sm text-[#195770] font-semibold" id="room_ready">5</span>
                              <span class="label-text text-sm text-[#195770] font-semibold"> Kursi Tersedia</span>
                          </div>
                        </div>
                        <input type="number" name="jumlah_kursi" placeholder="Jumlah Kursi" class="input input-bordered" required/>
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                          <span class="label-text text-base font-semibold">Nama anda <span class="text-red-600 font-bold">*</span></span>
                        </div>
                        <input type="text" name="name" placeholder="Nama Anda" class="input input-bordered" required/>
                    </label>
                    <label class="form-control w-full">
                        <div class="label">
                          <span class="label-text text-base font-semibold">Nomor WhatsApp <span class="text-red-600 font-bold">*</span></span>
                        </div>
                        <input type="text" name="whatsapp" placeholder="Nomor WhatsApp" class="input input-bordered" required/>
                    </label>
                    <label class="form-control w-full md:col-span-2">
                        <div class="label">
                          <span class="label-text text-base font-semibold">Tujuan Booking <span class="text-red-600 font-bold">*</span></span>
                        </div>
                        <textarea name="tujuan" placeholder="Tujuan ..." class="input input-bordered h-32" required></textarea>
                    </label>
                    <label class="w-full flex flex-col items-center mt-5 md:col-span-2">
                        {!! NoCaptcha::renderJs() !!}
                        {!! NoCaptcha::display() !!}
                        @error('g-recaptcha-response')
                        <span class="text-red-600 text-sm mt-1">{{ $message }}</span>
                        @enderror
                    </label>
                    <button type="submit" class="btn bg-[#195770] text-white mt-5 md:col-span-2">Booking</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        function booking(){
            let room = document.querySelector("#ruang").value.split("|");
            let room_id = room[0]
            let room_name = room[1]
            let room_seat_ready = room[2]

            if (room_id != "null") {
                showForm(room_id, room_name, room_seat_ready);
            }
        }

        function showForm(room_id, room_name, room_seat_ready){
            let form = document.getElementById("form-booking");
            let input_room_id = document.getElementById("room_id");
            let input_room_name = document.getElementById("room_name");
            let input_room_ready = document.getElementById("room_ready");

            input_room_id.value = room_id;
            input_room_name.value = room_name;
            input_room_ready.innerHTML = room_seat_ready;
            
            form.classList.remove('hidden');
            form.classList.add('grid');
        }
    </script>
@endsection