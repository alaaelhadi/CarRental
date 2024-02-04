@extends('User.layouts.main')

@section('title')
    Blog
@endsection

@push('header')
    Blog
@endpush

@section('content')
    @include('User.includes.header')
    @include('User.includes.blog')
@endsection