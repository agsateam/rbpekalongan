@extends('layouts.master')
@section('title', 'Beranda')
@section('content')


    <x-beranda.hero />
    <x-beranda.services />
    <x-beranda.statistik />
    <x-beranda.upcomingEvent />
    <x-beranda.testimonies />
    <x-beranda.activities :igposts="$igPosts" />

@endsection
