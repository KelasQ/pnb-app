<?php

namespace App\Http\Controllers;

use App\Models\Bantuan;
use App\Models\SubBantuan;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;

class BantuanController extends Controller
{
    public function index()
    {
        return view('bantuan.index', [
            'title'     =>  'Data Bantuan',
            'bantuans'  =>  Bantuan::orderBy('id', 'DESC')->paginate(20)
        ]);
    }

    public function create()
    {
        return view('bantuan.create', [
            'bantuan'   =>  new Bantuan,
            'submit'    => 'Simpan',
            'title'     => 'Tambah Data Bantuan'
        ]);
    }

    public function store(Request $request)
    {
        Bantuan::create($request->validate(['bantuan'  =>  'required|unique:bantuan,bantuan']));
        return redirect(route('bantuan.index'))->with('success', 'Data Bantuan Berhasil Disimpan.');
    }

    public function edit(Request $request, Bantuan $bantuan)
    {
        return view('bantuan.edit', [
            'submit'    =>  'Update',
            'bantuan'   =>  $bantuan
        ]);
    }

    public function update(Request $request, Bantuan $bantuan)
    {
        $bantuan->update($request->validate(['bantuan'  =>  'required']));
        return redirect(route('bantuan.index'))->with('success', 'Data Bantuan Berhasil Diupdate.');
    }

    public function destroy(Bantuan $bantuan)
    {
        $check = SubBantuan::where('bantuan_id', $bantuan->id)->count();
        if ($check === 0) {
            $bantuan->delete();
            return redirect(route('bantuan.index'))->with('success', 'Data Bantuan Berhasil Dihapus.');
        }
        return redirect(route('bantuan.index'))->with("warning", "Maaf, Data Tidak Dapat Dihapus! Data Bantuan ($bantuan->bantuan) Masih Tersedia Pada Data Sub Bantuan!");
    }
}
