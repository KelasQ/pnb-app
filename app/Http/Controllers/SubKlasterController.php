<?php

namespace App\Http\Controllers;

use App\Models\Klaster;
use App\Models\SubKlaster;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class SubKlasterController extends Controller
{
    public function index()
    {
        $sub_klaster = SubKlaster::orderBy('id', 'DESC')->paginate(20);
        return view('sub_klaster.index', [
            'title'     =>  'Data Klaster',
            'sub_klasters'  => $sub_klaster
        ]);
    }

    public function create()
    {
        return view('sub_klaster.create', [
            'klaster'       =>  Klaster::all(),
            'sub_klaster'   =>  new SubKlaster,
            'submit'        => 'Simpan',
            'title'         => 'Tambah Data Sub Klaster'
        ]);
    }

    public function store(Request $request)
    {
        SubKlaster::create($request->validate([
            'klaster_id' => 'required',
            'sub_klaster'  =>  'required|unique:sub_klaster,sub_klaster'
        ]));
        return redirect(route('sub-klaster.index'))->with('success', 'Data Sub Klaster Berhasil Disimpan.');
    }

    public function edit(SubKlaster $sub_klaster)
    {

        return view('sub_klaster.edit', [
            'title'     =>  'Update Data Sub Klaster',
            'submit'        =>  'Update',
            'klaster'       =>  Klaster::all(),
            'sub_klaster'    =>  $sub_klaster
        ]);
    }

    public function update(Request $request, SubKlaster $subKlaster)
    {
        $subKlaster->update($request->validate([
            'klaster_id'    =>  'required',
            'sub_klaster'   =>  'required'
        ]));
        return redirect(route('sub-klaster.index'))->with('success', 'Data Sub Klaster Berhasil Diupdate.');
    }

    public function destroy(SubKlaster $subKlaster)
    {
        $subKlaster->delete();
        return redirect(route('sub-klaster.index'))->with('success', 'Data Sub Klaster Berhasil Dihapus.');
    }
}
