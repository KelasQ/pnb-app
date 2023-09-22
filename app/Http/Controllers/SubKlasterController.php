<?php

namespace App\Http\Controllers;

use App\Models\Klaster;
use App\Models\SubKlaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubKlasterController extends Controller
{
    public function index()
    {
        $subKlaster = DB::table('sub_klaster')
            ->join('klaster', 'sub_klaster.klaster_id', '=', 'klaster.id')
            ->select('klaster.klaster', 'sub_klaster.sub_klaster', 'sub_klaster.id')
            ->get();
        return view('sub_klaster.index', [
            'title'     =>  'Data Klaster',
            'subKlaster'  => $subKlaster
        ]);
    }

    public function create()
    {
        return view('sub_klaster.create', [
            'klaster'       => DB::table('klaster')->get(),
            'sub_klaster'   =>  new SubKlaster,
            'submit'        => 'Simpan',
            'title'         => 'Tambah Data Sub Klaster'
        ]);
    }

    public function store(Request $request)
    {
        SubKlaster::create($request->validate([
            'klaster_id' => 'required',
            'sub_klaster'  =>  'required'
        ]));
        return redirect(url('subKlaster'))->with('success', 'Data Sub Klaster Berhasil Disimpan.');
    }

    public function edit(Request $request, SubKlaster $subKlaster)
    {
        $dataKlaster = DB::table('klaster')->whereNot('id', $subKlaster->klaster_id)->get();
        $dataSubKlaster = SubKlaster::where('sub_klaster.id', $subKlaster->id)
            ->join('klaster', 'sub_klaster.klaster_id', '=', 'klaster.id')
            ->select('klaster.id', 'klaster.klaster', 'sub_klaster.id', 'sub_klaster.sub_klaster', 'sub_klaster.klaster_id')
            ->first();

        return view('sub_klaster.edit', [
            'submit'        =>  'Update',
            'klaster'       =>  $dataKlaster,
            'subKlaster'    =>  $dataSubKlaster
        ]);
    }

    public function update(Request $request, SubKlaster $subKlaster)
    {
        $subKlaster->update($request->validate([
            'klaster_id'    =>  'required',
            'sub_klaster'   =>  'required'
        ]));
        return redirect(url('subKlaster'))->with('success', 'Data Sub Klaster Berhasil Diupdate.');
    }

    public function destroy(SubKlaster $subKlaster)
    {
        $subKlaster->delete();
        return redirect(url('subKlaster'))->with('success', 'Data Sub Klaster Berhasil Dihapus.');
    }
}
