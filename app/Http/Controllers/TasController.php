<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class TasController extends Controller
{
    public function index()
    {
        $tas = DB::table('tas')->orderBy('KodeTas')->paginate(10);
        return view('tas.index', compact('tas'));
    }

        public function tambah()
    {
        return view('tas.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'MerkTas' => 'required|string',
            'StockTas' => 'required|integer',
            'Tersedia' => 'required|string|size:1',
        ]);

        DB::table('tas')->insert([
            'MerkTas' => $request->MerkTas,
            'StockTas' => $request->StockTas,
            'Tersedia' => $request->Tersedia,
        ]);

        return redirect()->route('tas.index')->with('success', 'Data tas berhasil ditambahkan.');
    }

    public function update(Request $request, $KodeTas)
    {
        $request->validate([
            'MerkTas' => 'required|string',
            'StockTas' => 'required|integer',
            'Tersedia' => 'required|string|size:1',
        ]);

        DB::table('tas')
            ->where('KodeTas', $KodeTas)
            ->update([
                'MerkTas' => $request->MerkTas,
                'StockTas' => $request->StockTas,
                'Tersedia' => $request->Tersedia,
            ]);

        return redirect()->route('tas.index')->with('success', 'Data tas berhasil diubah.');
    }

    public function hapus($KodeTas)
    {
        DB::table('tas')->where('KodeTas', $KodeTas)->delete();

        return redirect()->route('tas.index')->with('success', 'Data tas berhasil dihapus.');
    }

    public function cari(Request $request)
	{
		// menangkap data pencarian
		$cari = $request->cari;

    	// mengambil data dari table tas sesuai pencarian data
        $tas = DB::table('tas')
        ->where('KodeTas', 'like', "%".$cari."%")
        ->paginate();

    		// mengirim data tas ke view index1
        return view('tas.index', compact('tas'));

	}

    public function edit($KodeTas)
    {
        $tas = DB::table('tas')->where('kodetas', $KodeTas)->first();

        if (!$tas) {
            abort(404);
        }

        return view('tas.edit', compact('tas'));
    }


}
