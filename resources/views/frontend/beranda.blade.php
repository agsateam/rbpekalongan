@extends('layouts.master')
@section('title', 'Beranda')
@section('content')

    <x-beranda.hero />
    <x-beranda.services />
    <x-beranda.statistik />
    <x-beranda.video />
    <x-beranda.fungsi :fungsi1="$fungsi1" :fungsi2="$fungsi2" :fungsi3="$fungsi3" :fungsi4="$fungsi4" :fungsi5="$fungsi5" />

    @if (count($events) > 0)
        <x-beranda.upcomingEvent :events="$events" />
    @endif

    <x-beranda.testimonies />
    <x-beranda.activities :igposts="$igPosts" />
    <x-beranda.products :products="$products" />

@endsection
