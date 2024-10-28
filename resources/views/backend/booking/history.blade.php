@extends('layouts.admin')
@section('title', 'Booking')
@section('content')

<div class="md:px-5">
    <div class="flex flex-col md:flex-row justify-between">
        <h4 class="text-2xl md:text-3xl font-bold mb-5">Booking</h4>
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li>Booking</li>
            </ul>
        </div>
    </div>

    <div class="w-full flex justify-center md:justify-start my-5">
        <a href="{{route('manage.booking')}}" class="pb-3 px-3 md:px-5 md:text-xl font-bold border-b-4 border-gray-200">Booking Hari Ini</a>
        <a href="{{route('manage.booking.history')}}" class="pb-3 px-3 md:px-5 md:text-xl font-bold border-b-4 border-[#195770]">Booking History</a>
    </div>

    @include('components.backend.alert')

    <table id="booking-table" class="w-full table table-auto border border-gray-200 rounded-md">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-3 text-left font-medium uppercase">No</th>
                <th class="py-3 text-left font-medium uppercase">Tanggal Booking</th>
                <th class="py-3 text-left font-medium uppercase">Kode</th>
                <th class="py-3 text-left font-medium uppercase">Tempat</th>
                <th class="py-3 text-left font-medium uppercase">Kursi</th>
                <th class="py-3 text-left font-medium uppercase">Nama</th>
                <th class="py-3 text-left font-medium uppercase">WhatsApp</th>
                <th class="py-3 text-left font-medium uppercase">Status</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200"></tbody>
    </table>
</div>

@endsection

@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#booking-table').DataTable({
            processing: true,
            serverSide: true,
            lengthChange: false,
            info: false,
            // order: [[ 1, 'desc' ]],
            ajax: "{{ route('manage.booking.data') . '?history=1' }}",
            columns: [
                { data: 'DT_RowIndex', orderable: false, searchable: false },
                { data: 'created_at', name: 'created_at', searchable: false },
                { data: 'code', name: 'code' },
                { data: 'room', name: 'room.name', orderable: false },
                { data: 'booking_seat', name: 'booking_seat' },
                { data: 'name', name: 'name' },
                { data: 'whatsapp', name: 'whatsapp' },
                { data: 'status', name: 'status' },
            ],
            language: {
                search: "",
                paginate: {
                    previous: "<",
                    next: ">"
                }
            },
            drawCallback: function () {
                $('#booking-table').removeClass('dataTable').addClass('w-full table table-auto border border-gray-200 rounded-md');
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
                wrap(document.getElementById('booking-table'), div);
            }
        });
    });

    function wrap(el, wrapper) {
        el.parentNode.insertBefore(wrapper, el);
        wrapper.appendChild(el);
    }

    function confirmCheckIn(href){
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Tandai data booking ini sudah check-in?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: "#195770",
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya',
        }).then((val) => {
            val['isConfirmed'] && (window.location.href = href)
        })
    }

    function confirmCancel(href){
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Batalkan booking ini?',
            icon: 'question',
            iconColor: 'red',
            showCancelButton: true,
            confirmButtonColor: "red",
            cancelButtonText: 'Batal',
            confirmButtonText: 'Ya',
        }).then((val) => {
            val['isConfirmed'] && (window.location.href = href)
        })
    }
</script>
@endsection