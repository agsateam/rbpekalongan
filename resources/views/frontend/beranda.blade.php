@extends('layouts.master')
@section('title', 'Beranda')
@section('content')

    <x-beranda.hero :hero="$hero" />
    <x-beranda.services />
    <x-beranda.statistik :statistik="$statistik" :jumlahevent="$jumlahevent" />
    <x-beranda.video />
    <x-beranda.fungsi :fungsirb="$fungsirb" />

    @if (count($events) > 0)
        <x-beranda.upcomingEvent :events="$events" />
    @endif

    <x-beranda.testimonies :testi="$testi" />
    <x-beranda.activities :igposts="$igPosts" />

    <x-beranda.mitra :mitra="$mitra" />

@endsection
