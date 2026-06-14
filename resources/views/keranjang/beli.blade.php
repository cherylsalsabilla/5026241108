@extends('template')
@section('title', 'Data Keranjang')
@section('konten')

    <h2>Beli</h2>

    @if ($errors->any())
        <ul style="color: red;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('keranjang.store') }}" method="POST" onsubmit="return validasiForm()">
        @csrf

        <p>
            <label>Kode Barang</label><br>
            <input type="text" name="KodeBarang" id="KodeBarang" maxlength="5" value="{{ old('KodeBarang') }}">
        </p>

        <p>
            <label>Jumlah Pembelian </label><br>
            <input type="number" name="Jumlah" id="Jumlah" value="{{ old('Jumlah') }}">
        </p>

        <p>
            <label>Harga</label><br>
            <input type="number" name="Harga" id="Harga"  value="{{ old('Harga') }}">
        </p>


        <button type="submit">Simpan</button>
        <a href="{{ route('keranjang.index') }}">Kembali</a>
    </form>

    <script>
        function validasiForm() {
            let kodebarang = document.getElementById('Kode Barang').value.trim();
            let jumlah = parseInt(document.getElementById('Jumlah').value);
            let harga = parseInt(document.getElementById('Harga').value);

            if (kodebarang === '') {
                Swal.fire({
                    title: "Kesalahan Input Data!",
                    text: "Kode Barang wajib diisi",
                    icon: "error"
                });
                return false;
            }

            if (kodebarang.length > 5) {
                Swal.fire({
                    title: "Kesalahan Input Data!",
                    text: "Kode Barang maksimal 5 karakter",
                    icon: "error"
                });
                return false;
            }

            if (jumlah === '') {
                Swal.fire({
                    title: "Kesalahan Input Data!",
                    text: "Jumlah wajib diisi",
                    icon: "error"
                });
                return false;
            }

            if (harga === '') {
                Swal.fire({
                    title: "Kesalahan Input Data!",
                    text: "Kelas wajib diisi",
                    icon: "error"
                });
                return false;
            }

            return true;
        }
    </script>
@endsection
