@extends('template')
@section('title', 'Data Nilai Kuliah')
@section('konten')

    <h2>Data Nilai Kuliah</h2>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <a href="{{ route('nilai.create') }}">Tambah Data</a>

    <br><br>

    <table class="table table-striped table-hover">
        <tr>
            <th>ID</th>
            <th>NRP</th>
            <th>Nilai Angka</th>
            <th>SKS</th>
            <th>Nilai Huruf</th>
            <th>Bobot</th>
        </tr>

        @forelse($nilai as $row)
            <tr>
                <td>{{ $row->ID }}</td>
                <td>{{ $row->NRP }}</td>
                <td>{{ $row->NilaiAngka }}</td>
                <td>{{ $row->SKS }}</td>
                <td>
                    @if ($row->NilaiAngka <= 40)
                        D
                    @elseif($row->NilaiAngka <= 60)
                        C
                    @elseif($row->NilaiAngka <= 80)
                        B
                    @else
                        A
                    @endif
                </td>
                <td>{{ $row->NilaiAngka * $row->SKS }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="7">Belum ada data nilai.</td>
            </tr>
        @endforelse
    </table>
@endsection
