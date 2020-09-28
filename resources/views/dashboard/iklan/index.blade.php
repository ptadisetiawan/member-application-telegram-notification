@extends('layouts.dashboard.index')


@section('title')
Dashboard - {{$pagename ?? ''}}
@endsection

@section('customcss')
 <style>
     .image-parent {
    max-width: 80px !important;
    min-width: 70px !important;
    }
.card{
    background-color: #FAFDFB !important;
}
 </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-12">
            @if(Session::has('message'))
            <p class="alert alert-info">{{ Session::get('message') }}</p>
            @endif
            <div class="card mb-4">
                <div class="card-header d-sm-flex align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Semua Iklan</h6>
                        <div>
                            <a href="{{route('iklan.create')}}" class="btn btn-sm btn-primary float-right mr-3">Tambah iklan baru</a>
                        </div>
                </div>
                <div class="card-body">
                  <div>
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <th>Nama</th>
                            <th>Gambar</th>
                            {{-- <th>Status</th> --}}
                            <th>Aksi</th>
                        </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
        </div>
    </div>



@endsection

@section('customjs')

  <script>

    $(document).ready(function() {
    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
  });
    $('#dataTable').DataTable({
         processing: true,
         serverSide: false,
         ajax: {
          url: "{{url('/dashboard/iklan')}}",
          type: 'GET',
         },
         columns: [
                  { data: 'nama', name: 'nama' },
                  { data: 'gambar', name: 'gambar' },
                //   { data: 'status', name: 'status' },
                  { data: 'action', name: 'action' },
               ],
        order: [[0, 'asc']],
        "pagingType": "simple"
      });
} );



  </script>
@endsection
