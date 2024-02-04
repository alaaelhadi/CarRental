@extends('User.layouts.main')

@section('title')
    Car Listing
@endsection

@push('header')
    Listings
@endpush

@section('content')
    @include('User.includes.header')
    @include('User.includes.pagination')
    @include('User.includes.testimonials')
@endsection