@extends('layouts.index')

@section('title', __('404 Not Found'))
@section('content')
<div class="text-center" style="padding-bottom: 32px">
    <img src="{{ asset('img/404.jpg') }}">
</div>
@endsection