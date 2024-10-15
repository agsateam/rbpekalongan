@extends('layouts.master')
@section('title', 'Beranda')
@section('content')

    <x-beranda.hero />
    <x-beranda.services />
    <x-beranda.statistik />
    <x-beranda.video />
    <x-beranda.fungsi :fungsirb="$fungsirb" />

    @if (count($events) > 0)
        <x-beranda.upcomingEvent :events="$events" />
    @endif

    <x-beranda.testimonies />
    <x-beranda.activities :igposts="$igPosts" />

    <x-beranda.mitra />


    @if (count($products) > 0)
        <x-beranda.products :products="$products" />
    @endif




@endsection
