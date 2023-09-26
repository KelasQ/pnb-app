<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class CaseController extends Controller
{
    public function index(Request $request)
    {
        return view('kasus.index', [
            'title'     =>  'Data Kasus',
            'cases'     =>  Kasus::orderBy('id', 'DESC')->paginate(20)
        ]);
    }

    public function create()
    {
        return view('kasus.create', [
            'case'      =>  new Kasus,
            'submit'    => 'Simpan',
            'title'     => 'Tambah Data Kasus'
        ]);
    }

    public function store(Request $request)
    {
        Kasus::create($request->validate(['kasus'  =>  'required|unique:kasus,kasus']));
        return redirect(route('case.index'))->with('success', 'Data Kasus Berhasil Disimpan.');
    }

    public function edit(Kasus $case)
    {
        return view('kasus.edit', [
            'title'     =>  'Update Data Kasus',
            'submit'    =>  'Update',
            'case'      =>  $case
        ]);
    }

    public function update(Request $request, Kasus $case)
    {
        $case->update($request->validate(['kasus'  =>  'required']));
        return redirect(route('case.index'))->with('success', 'Data Kasus Berhasil Diupdate.');
    }

    public function destroy(Kasus $case)
    {
        $case->delete();
        return redirect(route('case.index'))->with('success', 'Data Kasus Berhasil Dihapus.');
    }
}
