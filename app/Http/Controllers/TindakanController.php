<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Tindakan;
use Illuminate\Http\Request;

class TindakanController extends Controller
{
    public function index()
    {
        return view('tindakan.index', [
            'title' =>  'Data Tindakan/Layanan',
            'datas' =>  Tindakan::orderBy('id', 'DESC')->paginate(20),
        ]);
    }

    public function create()
    {
        return view('tindakan.create', [
            'title' =>  'Tambah Data Tindakan',
            'peserta'   =>  Peserta::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'peserta_id' => 'required',
            'tindakan' => 'required',
            'deskripsi_masalah' => 'required',
            'deskripsi_hasil' => 'required',
            'rencana_tindak_lanjut' => 'required',
        ]);

        $request['syarat_dan_ketentuan'] = ($request->syarat_dan_ketentuan) ? implode(',', $request->syarat_dan_ketentuan) : NULL;
        $request['tgl_terminasi'] = ($request->tgl_terminasi) ? date('Y-m-d', strtotime($request->tgl_terminasi)) : NULL;
        $request['tgl_masuk'] = ($request->tgl_masuk) ? date('Y-m-d', strtotime($request->tgl_masuk)) : NULL;
        $request['tgl_keluar'] = ($request->tgl_keluar) ? date('Y-m-d', strtotime($request->tgl_keluar)) : NULL;

        Tindakan::create($request->all());

        return redirect(route('tindakan.index'))->with('success', 'Data Tindakan Berhasil Disimpan.');
    }

    public function show(Tindakan $tindakan)
    {
        return view('tindakan.show', [
            'title' =>  'Detail Data Tindakan',
            'data'  =>  $tindakan,
        ]);
    }

    public function edit(Tindakan $tindakan)
    {
        $data = $tindakan;
        return view('tindakan.edit', [
            'title' =>  'Edit Data Tindakan',
            'data'  =>  $data,
            'peserta'   =>  Peserta::all(),
            'items' => explode(',', $data->syarat_dan_ketentuan)
        ]);
    }

    public function update(Request $request, Tindakan $tindakan)
    {
        $request->validate([
            'peserta_id' => 'required',
            'tindakan' => 'required',
            'deskripsi_masalah' => 'required',
            'deskripsi_hasil' => 'required',
            'rencana_tindak_lanjut' => 'required',
        ]);

        $request['syarat_dan_ketentuan'] = ($request->syarat_dan_ketentuan) ? implode(',', $request->syarat_dan_ketentuan) : NULL;
        $request['tgl_terminasi'] = ($request->tgl_terminasi) ? date('Y-m-d', strtotime($request->tgl_terminasi)) : NULL;
        $request['tgl_masuk'] = ($request->tgl_masuk) ? date('Y-m-d', strtotime($request->tgl_masuk)) : NULL;
        $request['tgl_keluar'] = ($request->tgl_keluar) ? date('Y-m-d', strtotime($request->tgl_keluar)) : NULL;

        $tindakan->update($request->all());

        return redirect(route('tindakan.index'))->with('success', 'Data Tindakan Berhasil Diupdate.');
    }

    public function destroy(Tindakan $tindakan)
    {
        $tindakan->delete();
        return redirect()->back()->with('success', 'Data Tindakan Berhasil Dihapus.');
    }
}
