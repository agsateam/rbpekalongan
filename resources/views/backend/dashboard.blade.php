@extends('layouts.admin')
@section('title', 'Dashboard')
@section('content')

<div class="md:px-5">
    <div class="flex flex-col md:flex-row justify-between">
        <h4 class="text-2xl md:text-3xl font-bold mb-5">Dashboard</h4>
        <div class="breadcrumbs text-sm">
            <ul>
                <li>Dashboard</li>
            </ul>
        </div>
    </div>

    @include('components.backend.alert')
</div>

@endsection