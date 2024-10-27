@extends('layouts.admin')
@section('title', 'Produk UMKM')

@section('content')
<div class="md:px-5">
    <div class="flex flex-col md:flex-row justify-between">
        <h4 class="text-2xl md:text-3xl font-bold mb-5">Produk UMKM</h4>
        <div class="breadcrumbs text-sm">
            <ul>
                <li><a href="{{route('dashboard')}}">Dashboard</a></li>
                <li>UMKM</li>
                <li>Produk</li>
            </ul>
        </div>
    </div>

    <div class="mt-10 mb-5">
        @include('components.backend.alert')
    </div>

    <a href="{{route('manage.product.add')}}" class="btn bg-[#195770] text-white mb-5">+ Tambah Data Produk</a>

    <table id="products-table"  class="w-full table table-auto border border-gray-200 rounded-md ">
        <thead class="bg-gray-100">
            <tr>
                <th class="py-3 text-left font-medium uppercase">Produk</th>
                <th class="py-3 text-left font-medium uppercase">UMKM</th>
                <th class="py-3 text-left font-medium uppercase">Kategori</th>
                <th class="py-3 text-left font-medium uppercase">Harga</th>
                <th class="py-3 text-left font-medium uppercase">#</th>
            </tr>
        </thead>
        <tbody class="bg-white divide-y divide-gray-200">
        </tbody>
    </table>
</div>
@endsection

@section('script')
{{-- Datatable --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        let urlParams = new URLSearchParams(window.location.search);
        $('#products-table').DataTable({
            processing: true,
            serverSide: true,
            lengthChange: false,
            info: false,
            search: {
                search: urlParams.get('search')
            },
            ajax: '{{ route('manage.product.data') }}',
            columns: [
                { data: 'name', name: 'name' },
                { data: 'umkm', name: 'umkm.name' },
                { data: 'category', name: 'category.name' },
                { data: 'price', name: 'price' },
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
                $('#products-table').removeClass('dataTable').addClass('w-full table table-auto border border-gray-200 rounded-md');
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
                wrap(document.getElementById('products-table'), div);
            }
        });
    });

    function wrap(el, wrapper) {
        el.parentNode.insertBefore(wrapper, el);
        wrapper.appendChild(el);
    }

    function confirmDelete(href){
        Swal.fire({
            title: 'Konfirmasi',
            text: 'Yakin akan menghapus produk ini?',
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