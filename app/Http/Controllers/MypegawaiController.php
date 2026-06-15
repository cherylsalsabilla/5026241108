<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class MypegawaiController extends Controller
{
    public function index()
    {
        $mypegawai = DB::table('mypegawai')->orderBy('kodepegawai')->get();
        return view('mypegawai.index', compact('mypegawai'));
    }

    public function tambah()
    {
        return view('mypegawai.tambah');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kodepegawai' => 'required|string|max:9|unique:mypegawai,kodepegawai',
            'namalengkap' => 'required|string|max:50',
            'divisi' => 'string|max:5',
            'departemen' => 'string|max:10',
        ]);

        DB::table('mypegawai')->insert([
            'kodepegawai' => $request->kodepegawai,
            'namalengkap' => $request->namalengkap,
            'divisi' => $request->divisi,
            'departemen' => $request->departemen,
        ]);

        return redirect()->route('mypegawai.index')->with('success', 'Data mypegawai berhasil ditambahkan.');
    }

    public function update(Request $request, $kodepegawai)
    {
        $request->validate([
            'kodepegawai' => [
                'required',
                'string',
                'max:9',
                Rule::unique('mypegawai', 'kodepegawai')->ignore($kodepegawai, 'kodepegawai'),
            ],
            'namalengkap' => 'required|string|max:50',
            'divisi' => 'string|max:5',
            'departemen' => 'string|max:10',
        ]);

        DB::table('mypegawai')
            ->where('kodepegawai', $kodepegawai)
            ->update([
                'kodepegawai' => $request->kodepegawai,
                'namalengkap' => $request->namalengkap,
                'divisi' => $request->divisi,
                'departemen' => $request->departemen,
            ]);

        return redirect()->route('mypegawai.index')->with('success', 'Data mypegawai berhasil diubah.');
    }

    public function view($kodepegawai)
    {
        $mypegawai = DB::table('mypegawai')->where('kodepegawai', $kodepegawai)->first();

        return view('mypegawai.view', compact('mypegawai'));
    }

}
