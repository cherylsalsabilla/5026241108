@extends('template')
@section('title', 'Kode Soal mypegawai')
@section('konten')

    <h2>Data mypegawai</h2>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('mypegawai.tambah') }}">Tambah mypegawai</a>

    <br><br>

    <table class="table table-striped table-hover">
        <tr>
            <th>Kode Pegawai</th>
            <th>Nama Lengkap</th>
            <th>Divisi</th>
            <th>Departemen</th>
            <th>Aksi</th>
        </tr>

        @forelse($mypegawai as $row)
            <tr>
                <td>{{ $row->kodepegawai }}</td>
                <td>{{ $row->namalengkap }}</td>
                <td>{{ $row->divisi }}</td>
                <td>{{ $row->departemen }}</td>
                <td>
                    <a href="{{ route('mypegawai.view', $row->kodepegawai) }}" class="btn btn-warning">View</a>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5">Belum ada data mypegawai.</td>
            </tr>
        @endforelse
    </table>
@endsection
