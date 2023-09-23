<?php

namespace App\Http\Controllers;

use App\Models\Bantuan;
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
        Bantuan::create($request->validate(['bantuan'  =>  'required']));
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
        $bantuan->delete();
        return redirect(route('bantuan.index'))->with('success', 'Data Bantuan Berhasil Dihapus.');
    }
}
