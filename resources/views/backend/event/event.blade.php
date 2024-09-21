@extends('layouts.admin')
@section('title', 'Kelola Event')
@section('content')

<div class="md:px-5">
    <div class="flex justify-between">
        <h4 class="text-2xl md:text-3xl font-bold mb-5">Kelola Event</h4>
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li>Event</li>
            </ul>
        </div>
    </div>

    <a href="{{route('manage.event.new')}}" class="btn bg-[#195770] text-white mb-5">+ Buat Event</a>

    <table id="event-table" class="w-full table table-auto border border-gray-200 rounded-md">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-3 text-left font-medium uppercase">Nama</th>
                <th class="py-3 text-left font-medium uppercase">Tanggal</th>
                <th class="py-3 text-left font-medium uppercase">Waktu</th>
                <th class="py-3 text-left font-medium uppercase">Lokasi</th>
                <th class="py-3 text-left font-medium uppercase">Status</th>
                <th class="py-3 text-left font-medium uppercase">Aksi</th>
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
        $('#event-table').DataTable({
            processing: true,
            serverSide: true,
            lengthChange: false,
            info: false,
            ajax: '{{ route('manage.event.data') }}',
            columns: [
                { data: 'name', name: 'name' },
                { data: 'date', name: 'date' },
                { data: 'time', name: 'time' },
                { data: 'location', name: 'location' },
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
                $('#event-table').removeClass('dataTable').addClass('w-full table table-auto border border-gray-200 rounded-md');
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
                wrap(document.getElementById('event-table'), div);
            }
        });
    });

    function wrap(el, wrapper) {
        el.parentNode.insertBefore(wrapper, el);
        wrapper.appendChild(el);
    }
</script>
@endsection