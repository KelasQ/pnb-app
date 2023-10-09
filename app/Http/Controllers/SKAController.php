<?php

namespace App\Http\Controllers;

use App\Models\DokumentasiSKA;
use App\Models\SKA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SKAController extends Controller
{
    public function index()
    {
        return view('ska.index', [
            'title'     =>  'Data SKA',
            'skas'     =>  SKA::orderBy('id', 'DESC')->paginate(20)
        ]);
    }

    public function create()
    {
        return view('ska.create', [
            'title'     => 'Tambah Data SKA'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_ska'    =>  'required',
            'deskripsi'    =>  'required',
        ]);

        SKA::create([
            'jenis_ska'   =>  $request->jenis_ska,
            'deskripsi'   =>  $request->deskripsi,
        ]);

        return redirect(route('ska.index'))->with('success', 'Data SKA Berhasil Disimpan.');
    }

    public function show(SKA $ska)
    {
        return view('ska.show', [
            'title'    =>  'Detail Data SKA',
            'ska'      =>  $ska
        ]);
    }

    public function edit(SKA $ska)
    {
        return view('ska.edit', [
            'title'    =>  'Detail Data SKA',
            'ska'      =>  $ska
        ]);
    }

    public function update(Request $request, SKA $ska)
    {
        $request->validate([
            'jenis_ska'   =>  'required',
            'deskripsi'   =>  'required',
        ]);

        $ska->update([
            'jenis_ska'   =>  $request->jenis_ska,
            'deskripsi'   =>  $request->deskripsi,
        ]);

        return redirect(route('ska.index'))->with('success', 'Data SKA Berhasil Diupdate.');
    }

    public function destroy(SKA $ska)
    {
        $ska->delete();
        return redirect(route('ska.index'))->with('success', 'Data SKA Berhasil Dihapus.');
    }

    public function dokumentasiSKA(String $id)
    {
        $data = SKA::where('id', $id)->firstOrFail();
        return view('ska.dokumentasi', [
            'title'    =>  'Data Dokumentasi SKA',
            'data'      =>  $data,
            'documentations' => DokumentasiSKA::where('ska', $data->id)->get()
        ]);
    }

    public function storeDokumentasiSKA(Request $request)
    {
        $request->validate([
            'foto_dokumentasi' => 'required',
            'foto_dokumentasi.*' => 'required|image|mimes:jpeg,jpg,png',
        ]);

        $files = [];
        if ($request->file('foto_dokumentasi')) {
            foreach ($request->file('foto_dokumentasi') as $key => $file) {
                $file_name = time() . rand(1, 99) . '.' . $file->extension();
                $file->storeAs('dokumentasi/ska/', $file_name);
                $files[]['name'] = $file_name;
            }
        }

        foreach ($files as $key => $file) {
            DokumentasiSKA::create([
                'ska_id' => $request->ska_id,
                'foto_dokumentasi'  => $file['name']
            ]);
        }

        return redirect()->back()->with('success', 'Data Dokumentasi Penerimaan Bantuan Berhasil Disimpan.');
    }

    public function destroyDokumentasiSKA(String $id)
    {
        $data = DokumentasiSKA::where('id', $id)->firstOrFail();
        Storage::delete('dokumentasi/ska/' . $data->foto_dokumentasi);
        $data->delete();
        return redirect()->back()->with('success', 'Foto Dokumentasi Berhasil Dihapus.');
    }
}
