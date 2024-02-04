@extends('User.layouts.main')

@section('title')
    About Us
@endsection

@push('header')
    About
@endpush

@section('content')
    @include('User.includes.header')
    @include('User.includes.about')
@endsection