@extends('template')
@section('title', 'Data Tas')
@section('konten')

    <h2>Edit Tas</h2>

        @if ($errors->any())
            <ul style="color: red;">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        <form action="{{ route('tas.update', $tas->kodetas) }}" method="POST" onsubmit="return validasiForm()">
            @csrf
            @method('PUT')

            <p>
                <label>Merk Tas</label><br>
                <input type="text" name="MerkTas" id="MerkTas" maxlength="30" value="{{ old('MerkTas', $tas->merktas) }}">
            </p>

            <p>
                <label>Stock Tas</label><br>
                <input type="number" name="StockTas" id="StockTas" value="{{ old('StockTas', $tas->stocktas) }}">
            </p>

            <p>
                <label>Tersedia</label><br>
                <input type="text" name="Tersedia" id="Tersedia" value="{{ old('Tersedia', $tas->tersedia) }}">
            </p>

            <button type="submit">Update</button>
            <a href="{{ route('tas.index') }}">Kembali</a>
        </form>

        <script>
            function validasiForm() {
                let MerkTas = document.getElementById('MerkTas').value.trim();
                let StockTas = document.getElementById('StockTas').value;
                let Tersedia = document.getElementById('Tersedia').value.trim();

                if (MerkTas === '') {
                    Swal.fire({
                        title: "Kesalahan Input Data!",
                        text: "Merk tas wajib diisi",
                        icon: "error"
                    });
                    return false;
                }

                if (StockTas === '') {
                    Swal.fire({
                        title: "Kesalahan Input Data!",
                        text: "StockTas wajib diisi",
                        icon: "error"
                    });
                    return false;
                }

                if (Tersedia === '') {
                    Swal.fire({
                        title: "Kesalahan Input Data!",
                        text: "Tersedia wajib diisi",
                        icon: "error"
                    });
                    return false;
                }

                if (Tersedia.length > 1) {
                    Swal.fire({
                        title: "Kesalahan Input Data!",
                        text: "Isi bagian ini dengan Y/N",
                        icon: "error"
                    });
                    return false;
                }

                return true;
            }
        </script>
    @endsection
