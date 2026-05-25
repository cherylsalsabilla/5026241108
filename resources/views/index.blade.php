<!--Menghubungkan dengan view template master-->
@extends('template')

@section('title', 'Data Pegawai')
<!--sw-->
@section('konten')
    <center>
        <br />
        <br />
        <p>Cari Data Pegawai :</p>
        <form action="/pegawaicari" method="GET">
            <input type="text" name="cari" placeholder="Cari Pegawai .." class="form-control">
            <input type="submit" value="CARI" class="btn btn-secondary">
        </form>

        <br />
        <table class="table table-striped table-hover">
            <tr>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Umur</th>
                <th>Alamat</th>
                <th>Opsi</th>
            </tr>
            @foreach ($pegawai as $p)
                <tr>
                    <td>{{ $p->pegawai_nama }}</td>
                    <td>{{ $p->pegawai_jabatan }}</td>
                    <td>{{ $p->pegawai_umur }}</td>
                    <td>{{ $p->pegawai_alamat }}</td>
                    <td>
                        <a href="/pegawaiedit/{{ $p->pegawai_id }}"class="btn btn-warning">Edit</a>

                        <a href="/pegawaihapus/{{ $p->pegawai_id }}"class="btn btn-danger">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <ul class="pagination" style="margin:20px 0">
            {{ $pegawai->links() }}

        <a href="/pegawaitambah" class="btn btn-primary"> + Tambah Pegawai Baru</a>
    </center>
@endsection
