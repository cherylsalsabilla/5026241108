@extends('template')
@section('title', 'Kode Soal mypegawai')
@section('konten')

    <h2>View mypegawai</h2>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif


        <p>
            <label>kodepegawai</label>
            {{  $mypegawai->kodepegawai }}
        </p>

        <p>
            <label>Nama Lengkap</label>
            {{$mypegawai->namalengkap }}
        </p>

        <p>
            <label>Divisi</label>
            {{ $mypegawai->divisi }}
        </p>

        <p>
            <label>Departemen</label>
            {{ $mypegawai->departemen }}
        </p>

        <a href="{{ route('mypegawai.index') }}">Kembali</a>

@endsection
