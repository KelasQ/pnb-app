<?php

namespace App\Http\Controllers;

use App\Models\Klaster;
use App\Models\SubKlaster;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class KlasterController extends Controller
{
    public function index()
    {
        return view('klaster.index', [
            'title'     =>  'Data Klaster',
            'klasters'  =>  Klaster::orderBy('id', 'DESC')->paginate(2)
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
        Klaster::create($request->validate(['klaster'  =>  'required|unique:klaster,klaster']));
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
        $check = SubKlaster::where('klaster_id', $klaster->id)->count();
        if (!$check) {
            $klaster->delete();
            return back()->with('success', 'Data Klaster Berhasil Dihapus.');
        }
        return back()->with("warning", "Maaf, Data Tidak Dapat Dihapus! Data Klaster ($klaster->klaster) Masih Tersedia Pada Data Sub Klaster!");
    }
}
