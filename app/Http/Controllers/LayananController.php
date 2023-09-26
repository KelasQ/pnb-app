<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class LayananController extends Controller
{
    public function index(Request $request)
    {
        return view('layanan.index', [
            'title'     =>  'Data Layanan',
            'layanans'     =>  Layanan::orderBy('id', 'DESC')->paginate(20)
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
        Layanan::create($request->validate(['layanan'  =>  'required|unique:layanan,layanan']));
        return redirect(route('layanan.index'))->with('success', 'Data Layanan Berhasil Disimpan.');
    }

    public function edit(Layanan $layanan)
    {
        return view('layanan.edit', [
            'title'     =>  'Update Data Layanan',
            'submit'    =>  'Update',
            'layanan'   =>  $layanan
        ]);
    }

    public function update(Request $request, Layanan $layanan)
    {
        $layanan->update($request->validate(['layanan'  =>  'required']));
        return redirect(route('layanan.index'))->with('success', 'Data Layanan Berhasil Diupdate.');
    }

    public function destroy(Layanan $layanan)
    {
        $layanan->delete();
        return redirect(route('layanan.index'))->with('success', 'Data Layanan Berhasil Dihapus.');
    }
}
