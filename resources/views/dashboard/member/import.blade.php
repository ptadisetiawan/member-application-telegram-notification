@extends('layouts.dashboard.index')

@section('title')
Dashboard - {{$pagename ?? ''}}
@endsection
@section('content')
<h2 class="section-title">Import data member</h2>
<p class="section-lead">Ambil data terlebih dahulu pada aplikasi Jeking</p>
<div class="container">
    <div class="row" style="padding-top: 30px">
        <div class="col-md-12">
            <div class="card shadow">
                <div class="card-body">
                    <form action="{{ route('member.import.save') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="">File (.xls, .xlsx)</label>
                            <input type="file" class="form-control" name="file">
                            <p class="text-danger">{{ $errors->first('file') }}</p>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-sm">Proses</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6"></div>
    </div>
</div>
@endsection
