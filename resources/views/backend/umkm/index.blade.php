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

    <button class="btn bg-[#195770] text-white mb-5" onclick="modalImport.showModal()">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5m-13.5-9L12 3m0 0 4.5 4.5M12 3v13.5" />
        </svg>
        Import Data
    </button>

    @if ($total > 0)
    <a href="{{route('manage.umkm.export')}}" class="btn bg-[#195770] text-white mb-5">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
            <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75V16.5M16.5 12 12 16.5m0 0L7.5 12m4.5 4.5V3" />
        </svg>
        Export Data
    </a>
    @endif
    
    @include('components.backend.alert')

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
        <tbody class="bg-white divide-y divide-gray-200"></tbody>
    </table>
</div>

@endsection


@section('script')
<dialog id="modal_import" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box pb-16 md:pb-8">
        <div class="w-full flex justify-between sticky top-0 z-10">
            <h3 class="text-lg font-bold">Import Data UMKM</h3>
            <button type="button" onclick="modalImport.close()" class="btn btn-sm bg-gray-500 text-white">Batal</button>
        </div>
        <div class="w-full mt-8">
            <a href="{{ asset('template-import.xlsx') }}" class="flex flex-row items-center bg-emerald-700 text-white px-3 py-2 rounded-md">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5 mr-1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                </svg>
                Download Template Import
            </a>
        </div>
        <form id="formImport" class="mt-5 w-full" action="{{route('manage.umkm.import')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="flex flex-col md:flex-row items-center w-full">
                <input id="inputFileImport" type="file" accept=".xlsx" name="file" class="input input-bordered h-11 w-full md:w-fit" required>
                <button id="submitImport" type="button" onclick="showLoading()" class="bg-[#195770] px-3 py-1 text-white h-11 grow rounded-md md:ml-2 mt-3 md:mt-0 w-full md:w-fit">Import</button>
            </div>
        </form>
        <div class="w-full mt-5 text-sm text-justify">
            <span>** Import data excel bersifat duplicate, jika terdapat data yang sama sebelumnya, data baru tetap akan ditambahkan. Maka dari itu cek kembali data yang akan diimport.</span>
        </div>
    </div>
</dialog>

<dialog id="modal_detail" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box pb-16 md:pb-8">
        <div class="w-full flex justify-between sticky top-0 z-10">
            <h3 class="text-lg font-bold">Berkas Pendukung</h3>
            <button type="button" onclick="modalDetail.close()" class="btn btn-sm bg-gray-500 text-white">Tutup</button>
        </div>
        <table class="table mt-5 w-full">
            <tr>
                <td>Nomor KTP</td>
                <td>:</td>
                <td id="ktp"></td>
            </tr>
            <tr>
                <td>KTP</td>
                <td>:</td>
                <td class="w-2/3">
                    <a target="_blank" rel="noopener noreferrer" id="ktp_image_link">
                        <img src="{{url('images/preview-image.jpg')}}" id="ktp_image" class="w-1/3">
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
                        <img src="{{url('images/preview-image.jpg')}}" id="npwp_image" class="w-1/3">
                    </a>
                </td>
            </tr>
            <tr>
                <td>Logo</td>
                <td>:</td>
                <td>
                    <a target="_blank" rel="noopener noreferrer" id="logo_link">
                        <img src="{{url('images/preview-image.jpg')}}" id="logo" class="w-1/3">
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
                { data: 'name', name: 'name', orderable: false },
                { data: 'owner', name: 'owner', orderable: false },
                { data: 'phone', name: 'phone', orderable: false },
                { data: 'fasilitator', name: 'fasilitator.name', orderable: false },
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
    const modalImport = document.getElementById('modal_import');
    const modalDetail = document.getElementById('modal_detail');

    function detail(data){
        modalDetail.showModal();
        document.getElementById('ktp').innerHTML = data.ktp ?? "-";
        document.getElementById('ktp_image').src = data.ktp_image ?? '{{ url('images/preview-image.jpg') }}';
        document.getElementById('ktp_image_link').href = data.ktp_image ?? '{{ url('images/preview-image.jpg') }}';
        document.getElementById('npwp').innerHTML = data.npwp ?? "-";
        document.getElementById('npwp_image').src = data.npwp_image ?? '{{ url('images/preview-image.jpg') }}';
        document.getElementById('npwp_image_link').href = data.npwp_image ?? '{{ url('images/preview-image.jpg') }}';
        document.getElementById('logo').src = data.logo ?? '{{ url('images/preview-image.jpg') }}';
        document.getElementById('logo_link').href = data.logo ?? '{{ url('images/preview-image.jpg') }}';
    }

    function showLoading(){
        var form = document.getElementById('formImport');
        var file = document.getElementById('inputFileImport');
        var button = document.getElementById('submitImport');

        if(file.files.length == 0){
            return;
        }

        button.innerHTML = "Load...";
        button.disabled = true;

        form.submit();
    }
</script>
@endsection