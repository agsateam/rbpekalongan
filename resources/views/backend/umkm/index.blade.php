@extends('layouts.admin')
@section('title', 'UMKM')
@section('content')

<div class="md:px-5">
    <div class="flex flex-col md:flex-row justify-between">
        <h4 class="text-2xl md:text-3xl font-bold mb-5">UMKM</h4>
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li>UMKM</li>
            </ul>
        </div>
    </div>

    <div class="mt-10 mb-5">
        @include('components.backend.alert')
    </div>

        <table id="umkm-table"  class="w-full table table-auto border border-gray-200 rounded-md ">
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
                {{-- @foreach ($data as $item)
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
                    </td>
                </tr>
                @endforeach --}}
            </tbody>
        </table>
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
                <td>Fasilitator yang dipilih</td>
                <td>:</td>
                <td id="mentor"></td>
            </tr>
            <tr>
                <td>Owner</td>
                <td>:</td>
                <td id="owner"></td>
            </tr>
            </tr>
            <tr>
                <td>Jeni Usaha</td>
                <td>:</td>
                <td id="type"></td>
            </tr>
            </tr>
            <tr>
                <td>Jeni Usaha</td>
                <td>:</td>
                <td id="desc"></td>
            </tr>
            <tr>
                <td>HP/Whatsapp</td>
                <td>:</td>
                <td id="phone"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td id="address"></td>
            </tr>
            <tr>
                <td>Instagram</td>
                <td>:</td>
                <td id="instagram"></td>
            </tr>
            <tr>
                <td>Facebook</td>
                <td>:</td>
                <td id="facebook"></td>
            </tr>
            <tr>
                <td>Nama Toko di Matketplace</td>
                <td>:</td>
                <td id="marketplace"></td>
            </tr>
            <tr>
                <td>Link Marketplace</td>
                <td>:</td>
                <td id="marketplace_link"></td>
            </tr>
            <tr>
                <td>Nomor KTP</td>
                <td>:</td>
                <td id="ktp"></td>
            </tr>
            <tr>
                <td>KTP</td>
                <td>:</td>
                <td>
                    <a target="_blank" rel="noopener noreferrer" id="ktp_image_link">
                        <img src="{{url('images/preview-image.jpg')}}" id="ktp_image" class="w-1/2">
                    </a>
                </td>
            </tr>
            <tr>
                <td>Nomor NPWP</td>
                <td>:</td>
                <td id="npwp"></td>
            </tr>
            <tr>
                <td>NPWP</td>
                <td>:</td>
                <td>
                    <a target="_blank" rel="noopener noreferrer" id="npwp_image_link">
                        <img src="{{url('images/preview-image.jpg')}}" id="npwp_image" class="w-1/2">
                    </a>
                </td>
            </tr>
            <tr>
                <td>Logo</td>
                <td>:</td>
                <td>
                    <a target="_blank" rel="noopener noreferrer" id="logo_link">
                        <img src="{{url('images/preview-image.jpg')}}" id="logo" class="w-1/2">
                    </a>
                </td>
            </tr>
        </table>
    </div>
</dialog>

{{-- Datatable --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        let urlParams = new URLSearchParams(window.location.search);
        $('#umkm-table').DataTable({
            processing: true,
            serverSide: true,
            lengthChange: false,
            info: false,
            search: {
                search: urlParams.get('search')
            },
            ajax: '{{ route('manage.umkm.data') }}',
            columns: [
                { data: 'name', name: 'name' },
                { data: 'owner', name: 'owner' },
                { data: 'phone', name: 'phone' },
                { data: 'fasilitator', name: 'fasilitator.name' },
                { data: 'action', name: 'action', orderable: false, searchable: false },
            ],
            language: {
                search: "",
                paginate: {
                    previous: "<",
                    next: ">"
                }
            },
            drawCallback: function () {
                $('#umkm-table').removeClass('dataTable').addClass('w-full table table-auto border border-gray-200 rounded-md');
                $('a.paginate_button.current').addClass('bg-[#195770] text-white hover:text-gray-600');
                $('a.paginate_button').addClass('btn btn-sm mr-1');
            },
            initComplete: function() {
                // Customizing Search Input
                $('div.dataTables_filter input').addClass('w-full md:max-w-xs rounded-sm focus:ring-[#195770] focus:border-[#195770] border-gray-300 px-2 mb-5').attr('placeholder','Cari ...');
                // Customizing Pagination
                $('div.dataTables_paginate').addClass('my-4');
                $('a.paginate_button.current').addClass('bg-[#195770] text-white hover:text-gray-600');
                $('a.paginate_button').addClass('btn btn-sm mr-1');

                // add scrollable table
                let div = document.createElement('div');
                div.classList.add("w-full")
                div.classList.add("overflow-x-auto")
                wrap(document.getElementById('umkm-table'), div);
            }
        });
    });

    function wrap(el, wrapper) {
        el.parentNode.insertBefore(wrapper, el);
        wrapper.appendChild(el);
    }
</script>

{{-- Action Button --}}
<script>
    const modalDetail = document.getElementById('modal_detail');
    function detail(data){
        modalDetail.showModal();
        document.getElementById('umkm').innerHTML = data.name;
        document.getElementById('mentor').innerHTML = data.fasilitator.name;
        document.getElementById('owner').innerHTML = data.owner;
        document.getElementById('type').innerHTML = data.type;
        document.getElementById('desc').innerHTML = data.desc;
        document.getElementById('phone').innerHTML = data.phone;
        document.getElementById('address').innerHTML = data.address;
        document.getElementById('instagram').innerHTML = data.instagram ?? "-";
        document.getElementById('facebook').innerHTML = data.facebook ?? "-";
        document.getElementById('marketplace').innerHTML = data.marketplace ?? "-";
        document.getElementById('marketplace_link').innerHTML = data.marketplace_link ?? "-";
        document.getElementById('ktp').innerHTML = data.ktp;
        document.getElementById('ktp_image').src = data.ktp_image;
        document.getElementById('ktp_image_link').href = data.ktp_image;
        document.getElementById('npwp').innerHTML = data.npwp ?? "-";
        document.getElementById('npwp_image').src = data.npwp_image ?? '{{ url('images/preview-image.jpg') }}';
        document.getElementById('npwp_image_link').href = data.npwp_image ?? '{{ url('images/preview-image.jpg') }}';
        document.getElementById('logo').src = data.logo ?? '{{ url('images/preview-image.jpg') }}';
        document.getElementById('logo_link').href = data.logo ?? '{{ url('images/preview-image.jpg') }}';
    }
</script>
@endsection