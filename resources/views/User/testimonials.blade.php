@extends('User.layouts.main')

@section('title')
    Testimonials
@endsection

@push('header')
    Testimonials
@endpush

@section('content')
    @include('User.includes.header')
    @include('User.includes.testimonials')
@endsection