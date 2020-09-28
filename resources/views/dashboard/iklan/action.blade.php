
<form method="POST" action="{{$urlDelete}}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
        {{-- <a class="btn btn-sm btn-primary" href="{{$urlShow}}">Show</a> --}}
        {{-- <a class="btn btn-sm btn-success" href="{{$urlEdit}}">Ubah</a> --}}
        <input type="submit" class="btn btn-sm btn-danger" onclick="event.preventDefault()
        if (confirm('Are you sure?')) {
        $(event.target).closest('form').submit()}" value="Hapus">
</form>
