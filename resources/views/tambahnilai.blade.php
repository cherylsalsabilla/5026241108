@extends('templatenilai')
@section('title', 'Data Nilai Siswa')
@section('konten')

    <h2>Tambah Nilai Siswa</h2>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('nilai.store') }}" method="POST" onsubmit="return validasiForm()">
        @csrf

        <p>
            <label>NRP</label><br>
            <input type="text" name="NRP" id="NRP" maxlength="10" value="{{ old('NRP') }}">
        </p>

        <p>
            <label>Nilai Angka</label><br>
            <input type="text" name="NilaiAngka" id="NilaiAngka" value="{{ old('NilaiAngka') }}">
        </p>

        <p>
            <label>SKS</label><br>
            <input type="text" name="SKS" id="SKS" value="{{ old('SKS') }}">
        </p>

        <button type="submit">Simpan</button>
        <a href="{{ route('nilai.index') }}">Kembali</a>
    </form>

    <script>
        function validasiForm() {
            let nrp = document.getElementById('NRP').value.trim();
            let nilai = document.getElementById('NilaiAngka').value.trim();
            let sks = document.getElementById('SKS').value.trim();

            if (nrp === '') {
                Swal.fire({
                    title: "Kesalahan Input Data!",
                    text: "NRP wajib diisi",
                    icon: "error"
                });
                return false;
            }

            if (nrp.length > 10) {
                Swal.fire({
                    title: "Kesalahan Input Data!",
                    text: "NRP maksimal 10 karakter",
                    icon: "error"
                });
                return false;
            }

            if (nilai === '') {
                Swal.fire({
                    title: "Kesalahan Input Data!",
                    text: "Nilai Angka wajib diisi",
                    icon: "error"
                });
                return false;
            }

            if (sks === '') {
                Swal.fire({
                    title: "Kesalahan Input Data!",
                    text: "SKS wajib diisi",
                    icon: "error"
                });
                return false;
            }

            return true;
        }
    </script>
@endsection
