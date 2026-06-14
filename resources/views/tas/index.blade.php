<!--Menghubungkan dengan view template master-->
@extends('template')

@section('title', 'Data Tas')
<!--sw-->
@section('konten')
    <center>
        <br />
        <br />
        <p>Cari Data Tas :</p>
        <form action="/tascari" method="GET">
            <input type="text" name="cari" placeholder="Cari Tas .." class="form-control">
            <input type="submit" value="CARI" class="btn btn-secondary">
        </form>

        <br />
        <table class="table table-striped table-hover">
            <tr>
                <th>Kode Tas</th>
                <th>Merk Tas</th>
                <th>Stock Tas</th>
                <th>Tersedia</th>
                <th>Opsi</th>
            </tr>
            @foreach ($tas as $row)
                <tr>
                    <td>{{ $row->kodetas }}</td>
                    <td>{{ $row->merktas }}</td>
                    <td>{{ $row->stocktas }}</td>
                    <td>{{ $row->tersedia }}</td>
                    <td>
                        {{-- <a href="/tasedit/{{ $p->tas_id }}"class="btn btn-warning">Edit</a>

                        <a href="/tashapus/{{ $p->tas_id }}"class="btn btn-danger">Hapus</a> --}}
                        <a href="{{ route('tas.edit', $row->kodetas) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('tas.hapus', $row->kodetas) }}" method="POST" style="display:inline;"
                            onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>

                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
        <ul class="pagination" style="margin:20px 0">
            {{ $tas->links() }}

            <a href="/tastambah" class="btn btn-primary"> + Tambah Tas Baru</a>
    </center>
@endsection
