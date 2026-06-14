@extends('template')
@section('title', 'Data Keranjang')
@section('konten')

    <h2>Data Keranjang</h2>

    @if (session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <br><br>

    <table class="table table-striped table-hover">
        <tr>
            <th>Kode Pembelian</th>
            <th>Kode Barang</th>
            <th>Jumlah Pembelian</th>
            <th>Harga per item</th>
            <th>Total</th>
            <th>Action</th>
        </tr>

        @forelse($keranjang as $row)
            <tr>
                <td>{{ $row->ID }}</td>
                <td>{{ $row->KodeBarang }}</td>
                <td>{{ $row->Jumlah }}</td>
                <td>{{ number_format($row->Harga , 0, ',', '.') }}</td>
                <td>{{ number_format($row->Jumlah*$row->Harga , 0, ',', '.') }}</td>

                <td>
                    <a href="{{ route('keranjang.beli', $row->ID) }}" class="btn btn-warning">Beli</a>

                    <form action="{{ route('keranjang.batal', $row->ID) }}" method="POST" style="display:inline;"
                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Batal</button>

                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6">Belum ada data keranjang.</td>
            </tr>
        @endforelse
    </table>
@endsection
