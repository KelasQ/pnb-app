<?php

namespace App\Http\Controllers;

use App\Models\Klaster;
use Illuminate\Http\Request;

class KlasterController extends Controller
{
    public function index()
    {
        return view('klaster.index', [
            'title'     =>  'Data Klaster',
            'klasters'  =>  Klaster::orderBy('id', 'DESC')->get()
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
        Klaster::create($request->validate(['klaster'  =>  ['required']]));
        return redirect(url('klaster'))->with('success', 'Data Klaster Berhasil Disimpan.');
    }

    public function edit(Request $request, Klaster $klaster)
    {
        return view('klaster.edit', [
            'submit'    =>  'Update',
            'klaster'      =>  $klaster
        ]);
    }

    public function update(Request $request, Klaster $klaster)
    {
        $klaster->update($request->validate(['klaster'  =>  ['required']]));
        return redirect(url('klaster'))->with('success', 'Data Klaster Berhasil Diupdate.');
    }

    public function destroy(Klaster $klaster)
    {
        $klaster->delete();
        return redirect(url('klaster'))->with('success', 'Data Klaster Berhasil Dihapus.');
    }
}
