<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjang = DB::table('keranjangbelanja')->orderBy('ID')->get();
        return view('keranjang.index', compact('keranjang'));
    }

        public function beli()
    {
        return view('keranjang.beli');
    }

    public function store(Request $request)
    {
        $request->validate([
            'KodeBarang' => 'required|string|max:5',
            'Jumlah' => 'required|integer',
            'Harga' => 'required|integer',
        ]);

        DB::table('keranjangbelanja')->insert([
            'KodeBarang' => $request->KodeBarang,
            'Jumlah' => $request->Jumlah,
            'Harga' => $request->Harga,
        ]);

        return redirect()->route('keranjang.index')->with('success', 'Data keranjang berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'KodeBarang' => 'required|string|max:5',
            'Jumlah' => 'required|integer',
            'Harga' => 'required|integer',
        ]);

        DB::table('keranjangbelanja')
            ->where('ID', $id)
            ->update([
                'KodeBarang' => $request->KodeBarang,
                'Jumlah' => $request->Jumlah,
                'Harga' => $request->Harga,
            ]);

        return redirect()->route('keranjang.index')->with('success', 'Data keranjang berhasil diubah.');
    }

    public function batal($id)
    {
        DB::table('keranjangbelanja')->where('ID', $id)->delete();

        return redirect()->route('keranjang.index')->with('success', 'Data keranjang berhasil dihapus.');
    }
}
