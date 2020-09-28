@extends('layouts.dashboard.index')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-10 offset-1">
            <div class="card">
              <div class="card-body">
                <form  @if($type === 'edit')
                action="{{route('iklan.update', $lokasi->id)}}"
                @else
                action="{{route('iklan.store')}}"
                @endif
                method="POST" enctype="multipart/form-data">
            @csrf
            @if ($type === 'edit')
                <input name="_method" type="hidden" value="PUT">
            @endif
            <div class="form-group">
            <label for="nama">Nama</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama iklan" value="{{old('nama')}}">
            @error('nama')
            <div class="error">{{ $message }}</div>
            @enderror
            </div>

            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                <p>Upload gambar iklan</p>
                <div class="input-group">
                    <div class="input-group-prepend">
                    <span class="input-group-text">Gambar</span>
                    </div>
                    <div class="custom-file">
                    <input onchange="loadPreview(this);" type="file" class="custom-file-input" name="file" id="file" aria-describedby="inputGroupFileAddon01">
                    <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
                    </div>
                </div>
                @error('file')
                    <div class="error">{{ $message }}</div>
                @enderror
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 text-center">
                <img id="preview"
                @if($type === 'edit' )
                src="{{asset($lokasi->gambar)}}"
                @else
                src="{{asset('img/blank.jpg')}}"
                @endif

                alt="Image" height="200"/>
                </div>
            </div>

            <button type="submit" class="btn btn-primary float-right mt-4 ">Simpan</button>
        </form>
              </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('customcss')

@endsection

@section('customjs')
<script>
    function loadPreview(input, id) {
        id = id || '#preview';
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $(id)
                        .attr('src', e.target.result)
                        .width(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endsection
