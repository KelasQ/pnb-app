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
        // $request->validate([
        //     'peserta_id' => 'required',
        //     'tindakan' => 'required',
        //     'sub_layanan' => 'required',
        //     'kategori_asrama' => 'required',
        //     'nama_asrama' => 'required',
        //     'kategori_intervensi' => 'required',
        //     'deskripsi_layanan' => 'required',
        //     'tgl_terminasi' => 'required',
        //     'alasan_terminasi' => 'required',
        //     'syarat_dan_ketentuan' => 'required',
        //     'deskripsi_masalah' => 'required',
        //     'deskripsi_hasil' => 'required',
        //     'rencana_tindak_lanjut' => 'required',
        //     'tgl_masuk' => 'required',
        //     'tgl_keluar' => 'required',
        // ]);
        // $data = $request->syarat_dan_ketentuan;
        // dd(implode(",", $data));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
