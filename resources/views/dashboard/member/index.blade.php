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
            <div class="card mb-4">
                <div class="card-header d-sm-flex align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Semua Member</h6>
                        <div>
                            <a href="{{route('member.import')}}" class="btn btn-sm btn-primary float-right mr-3">Import data member</a>
                        </div>
                </div>
                <div class="card-body">
                  <div>
                    <table class="table" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th>Kota</th>
                            <th>Telepon</th>
                            <th>Poin</th>
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
          url: "{{url('/dashboard/member')}}",
          type: 'GET',
         },
         columns: [
                  { data: 'kode', name: 'kode' },
                  { data: 'nama', name: 'nama' },
                  { data: 'kota', name: 'kota' },
                  { data: 'telepon', name: 'telepon' },
                  { data: 'balance', name: 'balance' },
               ],
        order: [[0, 'asc']],
        "pagingType": "simple"
      });
} );



  </script>
@endsection
