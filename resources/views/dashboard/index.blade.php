@extends('layouts.dashboard.index')

@section('title')
Dashboard - {{$pagename ?? ''}}
@endsection
@section('content')
@if (auth()->user()->isAdmin())
<h2 class="section-title">Selamat datang admin</h2>
<div class="container">
<div class="row">
    <div class="col-md-12">
        <div class="row">



        </div>
    </div>
</div>
</div>
@else
<h2 class="section-title">Selamat datang {{auth()->user()->name ?? ''}} !</h2>
@endif
@endsection

