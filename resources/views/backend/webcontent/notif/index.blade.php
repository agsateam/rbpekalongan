@extends('layouts.admin')
@section('title', 'Whatsapp Notif')
@section('content')

    <div class="md:px-5">


        <div class="flex flex-col md:flex-row justify-between">
            <h4 class="text-2xl md:text-3xl font-bold mb-5">Whatsapp Notif</h4>
            <div class="breadcrumbs text-sm">
                <ul>
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li>Web Content</li>
                    <li>Whatsapp Notif</li>
                </ul>
            </div>
        </div>

        @include('components.backend.alert')



        <div class="flex flex-col border rounded-md p-5 mt-5">
            <form class="flex flex-col" action="{{ route('webcontent.notif.update') }}" method="post">
                @csrf
                <label class="form-control w-full">
                    <div class="label">
                        <span class="label-text text-base font-semibold">
                            Nomor Whatsapp <span class="text-red-600 font-bold">*</span>
                        </span>
                    </div>
                    <input type="number" inputmode="numeric" name="number" value="{{ $data->whatsapp_notif }}"
                        placeholder="628...." class="input input-bordered w-full" required />
                </label>
                <button type="submit" class="btn bg-[#195770] text-white mt-5">Simpan</button>
            </form>
            <div class="mt-10 border-t pt-5 text-gray-600">
                <div class="flex items-start">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                        class="text-[#195770] size-5 hidden md:block">
                        <path fill-rule="evenodd"
                            d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm11.378-3.917c-.89-.777-2.366-.777-3.255 0a.75.75 0 0 1-.988-1.129c1.454-1.272 3.776-1.272 5.23 0 1.513 1.324 1.513 3.518 0 4.842a3.75 3.75 0 0 1-.837.552c-.676.328-1.028.774-1.028 1.152v.75a.75.75 0 0 1-1.5 0v-.75c0-1.279 1.06-2.107 1.875-2.502.182-.088.351-.199.503-.331.83-.727.83-1.857 0-2.584ZM12 18a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Z"
                            clip-rule="evenodd" />
                    </svg>
                    <div class="ml-1 text-base">
                        <span class="md:hidden text-[#195770] font-bold">*</span>
                        Nomor whatsapp yang akan mendapatkan notifikasi ketika ada pendaftaran event dan booking tempat.
                        <br />
                        Wajib gunakan kode negara 628..., contoh <span class="font-bold">08150021000</span> menjadi <span
                            class="font-bold">628150021000</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script></script>
@endsection
