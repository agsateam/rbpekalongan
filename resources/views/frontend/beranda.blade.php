@extends('layouts.master')
@section('title', 'Beranda')
@section('content')


    <x-beranda.hero />
    <x-beranda.services />
    <x-beranda.statistik />
    <x-beranda.video />
    
    @if (count($events) > 0)
    <x-beranda.upcomingEvent :events="$events" />
    @endif
    
    <x-beranda.testimonies />
    <x-beranda.activities :igposts="$igPosts" />

@endsection
