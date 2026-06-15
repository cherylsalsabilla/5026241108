@extends('template')
@section('title', 'Kode Soal mypegawai')
@section('konten')

    <h2>Tambah mypegawai</h2>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('mypegawai.store') }}" method="POST" onsubmit="return validasiForm()">
        @csrf

        <p>
            <label>Kode Pegawai</label>
            <input type="text" name="kodepegawai" id="kodepegawai" maxlength="9" value="{{ old('kodepegawai') }}">
        </p>

        <p>
            <label>Nama Lengkap</label>
            <input type="text" name="namalengkap" id="namalengkap" maxlength="50" value="{{ old('namalengkap') }}">
        </p>

        <p>
            <label>Divisi</label>
            <input type="text" name="divisi" id="divisi" maxlength="5" value="{{ old('divisi') }}">
        </p>

        <p>
            <label>Departemen</label>
            <input type="text" name="departmen" id="departmen" maxlength="10" value="{{ old('departmen') }}">
        </p>

        <button type="submit">Simpan</button>
        <a href="{{ route('mypegawai.index') }}">Kembali</a>
    </form>

    <script>

        function hanyaHurufAngka(value) {
        const regex = /^[A-Za-z0-9]+$/;
        return regex.test(value);
        }

        function hanyaHuruf(value) {
        // Regex hanya huruf besar/kecil dan spasi
        const regex = /^[A-Za-z\s]+$/;
        return regex.test(value);
        }

        function validasiForm() {
            let kodepegawai = document.getElementById('kodepegawai').value.trim();
            let namalengkap = document.getElementById('namalengkap').value.trim();
            let divisi = document.getElementById('divisi').value.trim();
            let departmen = document.getElementById('departmen').value.trim();

            if (kodepegawai === '') {
                Swal.fire({
                    title: "Kesalahan Input Data!",
                    text: "Kode Pegawai wajib diisi",
                    icon: "error"
                });
                return false;
            }

            if (!hanyaHurufAngka(kodepegawai)) {
                Swal.fire({
                    title: "Kesalahan Input Data!",
                    text: "Kode Pegawai hanya bisa diisi dengan huruf dan angka!",
                    icon: "error"
                });
                return false;
            }

            if (namalengkap === '') {
                Swal.fire({
                    title: "Kesalahan Input Data!",
                    text: "Nama Lengkap wajib diisi",
                    icon: "error"
                });
                return false;
            }

            if (!hanyaHuruf(namalengkap)) {
                Swal.fire({
                    title: "Kesalahan Input Data!",
                    text: "Nama Lengkap hanya bisa diisi dengan huruf!",
                    icon: "error"
                });
                return false;
            }

            return true;
        }
    </script>
@endsection
