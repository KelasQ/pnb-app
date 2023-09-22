<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index(Request $request)
    {
        return view('layanan.index', [
            'title'     =>  'Data Layanan',
            'layanan'     =>  Layanan::orderBy('id', 'DESC')->get()
        ]);
    }

    public function create()
    {
        return view('layanan.create', [
            'layanan'   =>  new Layanan,
            'submit'    => 'Simpan',
            'title'     => 'Tambah Data Layanan'
        ]);
    }

    public function store(Request $request)
    {
        Layanan::create($request->validate(['layanan'  =>  'required']));
        return redirect(url('layanan'))->with('success', 'Data Layanan Berhasil Disimpan.');
    }

    public function edit(Request $request, Layanan $layanan)
    {
        return view('layanan.edit', [
            'submit'    =>  'Update',
            'layanan'   =>  $layanan
        ]);
    }

    public function update(Request $request, Layanan $layanan)
    {
        $layanan->update($request->validate(['layanan'  =>  'required']));
        return redirect(url('layanan'))->with('success', 'Data Layanan Berhasil Diupdate.');
    }

    public function destroy(Layanan $layanan)
    {
        $layanan->delete();
        return redirect(url('layanan'))->with('success', 'Data Layanan Berhasil Dihapus.');
    }
}
