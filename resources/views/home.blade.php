@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Dashboard</h1>
@stop

@section('content')
<p>Welcome to this beautiful admin panel.</p>

<div class="info-box bg-gradient-info">
    <span class="info-box-icon"><i class="far fa-bookmark"></i></span>
    <div class="info-box-content">
        <span class="info-box-text">Bookmarks</span>
        <span class="info-box-number">41,410</span>
        <div class="progress">
            <div class="progress-bar" style="width: 70%"></div>
        </div>
        <span class="progress-description">
            70% Increase in 30 Days
        </span>
    </div>
</div>
@stop

{{-- @section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
<script>
    console.log('Hi!');
</script>
@stop --}}