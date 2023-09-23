<?php

namespace App\Http\Controllers;

use App\Models\Klaster;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class KlasterController extends Controller
{
    public function index()
    {
        return view('klaster.index', [
            'title'     =>  'Data Klaster',
            'klasters'  =>  Klaster::orderBy('id', 'DESC')->paginate(20)
        ]);
    }

    public function create()
    {
        return view('klaster.create', [
            'klaster'   =>  new Klaster,
            'submit'    => 'Simpan',
            'title'     => 'Tambah Data Klaster'
        ]);
    }

    public function store(Request $request)
    {
        Klaster::create($request->validate(['klaster'  =>  'required']));
        return redirect(route('klaster.index'))->with('success', 'Data Klaster Berhasil Disimpan.');
    }

    public function edit(Request $request, Klaster $klaster)
    {
        return view('klaster.edit', [
            'title'     =>  'Update Data Klaster',
            'submit'    =>  'Update',
            'klaster'      =>  $klaster
        ]);
    }

    public function update(Request $request, Klaster $klaster)
    {
        $klaster->update($request->validate(['klaster'  =>  'required']));
        return redirect(route('klaster.index'))->with('success', 'Data Klaster Berhasil Diupdate.');
    }

    public function destroy(Klaster $klaster)
    {
        $klaster->delete();
        return redirect(route('klaster.index'))->with('success', 'Data Klaster Berhasil Dihapus.');
    }
}
