<?php

namespace App\Http\Controllers;

use App\Models\Bantuan;
use App\Models\SubBantuan;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class SubBantuanController extends Controller
{
    public function index()
    {
        return view('sub_bantuan.index', [
            'title'     =>  'Data Klaster',
            'sub_bantuans'  => SubBantuan::orderBy('id', 'DESC')->paginate(20)
        ]);
    }

    public function create()
    {
        return view('sub_bantuan.create', [
            'bantuan'       =>  Bantuan::all(),
            'sub_bantuan'   =>  new SubBantuan,
            'submit'        => 'Simpan',
            'title'         => 'Tambah Data Sub Bantuan'
        ]);
    }

    public function store(Request $request)
    {
        SubBantuan::create($request->validate([
            'bantuan_id' => 'required',
            'sub_bantuan'  =>  'required|unique:sub_bantuan,sub_bantuan'
        ]));
        return redirect(route('sub-bantuan.index'))->with('success', 'Data Sub Bantuan Berhasil Disimpan.');
    }

    public function edit(SubBantuan $sub_bantuan)
    {
        return view('sub_bantuan.edit', [
            'title'     =>  'Update Data Sub Bantuan',
            'submit'        =>  'Update',
            'bantuan'       =>  Bantuan::all(),
            'sub_bantuan'    =>  $sub_bantuan
        ]);
    }

    public function update(Request $request, SubBantuan $sub_bantuan)
    {
        $sub_bantuan->update($request->validate([
            'bantuan_id'    =>  'required',
            'sub_bantuan'   =>  'required'
        ]));
        return redirect(route('sub-bantuan.index'))->with('success', 'Data Sub Bantuan Berhasil Diupdate.');
    }

    public function destroy(SubBantuan $sub_bantuan)
    {
        $sub_bantuan->delete();
        return redirect(route('sub-bantuan.index'))->with('success', 'Data Sub Bantuan Berhasil Dihapus.');
    }
}
