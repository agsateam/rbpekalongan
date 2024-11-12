@extends('layouts.admin')
@section('title', 'Pendaftaran Event')
@section('content')

<div class="md:px-5">
    <div class="flex flex-col md:flex-row justify-between">
        <h4 class="text-2xl md:text-3xl font-bold mb-5">Kelola Pendaftaran Event</h4>
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li><a href="{{route('manage.event')}}">Event</a></li>
                <li>Pendaftaran</li>
            </ul>
        </div>
    </div>
    
    @include('components.backend.alert')

    <table id="regist-table" class="w-full table table-auto border border-gray-200 rounded-md">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-3 text-left font-medium uppercase">Event</th>
                <th class="py-3 text-left font-medium uppercase">Nama</th>
                <th class="py-3 text-left font-medium uppercase">Kontak</th>
                <th class="py-3 text-left font-medium uppercase">UMKM</th>
                <th class="py-3 text-left font-medium uppercase">Status</th>
                <th class="py-3 text-left font-medium uppercase">Aksi</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200"></tbody>
    </table>
</div>

@endsection

@section('script')
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
                <td>Instagram</td>
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

{{-- Datatable --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#regist-table').DataTable({
            processing: true,
            serverSide: true,
            lengthChange: false,
            info: false,
            ajax: '{{ route('manage.eventregist.data') }}',
            columns: [
                { data: 'event', name: 'event' },
                { data: 'name', name: 'name' },
                { data: 'phone', name: 'phone' },
                { data: 'umkm', name: 'umkm' },
                { data: 'status', name: 'status' },
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
                $('#regist-table').removeClass('dataTable').addClass('w-full table table-auto border border-gray-200 rounded-md');
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
                wrap(document.getElementById('regist-table'), div);
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