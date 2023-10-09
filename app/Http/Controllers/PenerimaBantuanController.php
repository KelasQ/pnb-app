<?php

namespace App\Http\Controllers;

use App\Models\DokumentasiPenerimaanBantuan;
use App\Models\Karyawan;
use App\Models\PenerimaBantuan;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenerimaBantuanController extends Controller
{
    public function index(String $id)
    {
        $data = Peserta::where('id', $id)->firstOrFail();
        $dataBantuan = PenerimaBantuan::where('peserta_id', $id)->get();

        return view('data-bantuan.index', [
            'title' =>  'Data Bantuan',
            'data'  =>  $data,
            'dataBantuan' => $dataBantuan,
        ]);
    }

    public function create(String $id)
    {
        $data = Peserta::where('id', $id)->firstOrFail();

        return view('data-bantuan.create', [
            'title' =>  'Input Data Bantuan',
            'data'  =>  $data,
            'karyawan' => Karyawan::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'bantuan'   =>  'required',
            'tgl_pemberian' =>  'required',
            'karyawan_id'   =>  'required',
            'nominal_bantuan'   =>  'required',
        ]);

        PenerimaBantuan::create([
            'peserta_id'   =>  $request->peserta_id,
            'bantuan'   =>  $request->bantuan,
            'sub_bantuan'   =>  $request->sub_bantuan,
            'keterangan'   =>  $request->keterangan,
            'tgl_pemberian'   =>  date('Y-m-d', strtotime($request->tgl_pemberian)),
            'karyawan_id'   =>  $request->karyawan_id,
            'nominal_bantuan'   =>  $request->nominal_bantuan,
        ]);

        return redirect(route('data-bantuan', $request->peserta_id))->with('success', 'Data Bantuan Berhasil Disimpan.');
    }

    public function show(string $id)
    {
        $data = PenerimaBantuan::where('id', $id)->firstOrFail();

        return view('data-bantuan.show', [
            'title' =>  'Detail Data Bantuan',
            'data'  =>  $data,
        ]);
    }

    public function edit(string $id)
    {
        $data = PenerimaBantuan::where('id', $id)->firstOrFail();

        return view('data-bantuan.edit', [
            'title' =>  'Edit Data Bantuan',
            'data'  =>  $data,
            'karyawan' => Karyawan::all(),
        ]);
    }

    public function update(Request $request, string $id)
    {
        $data = PenerimaBantuan::where('id', $id)->firstOrFail();

        $request->validate([
            'bantuan'   =>  'required',
            'tgl_pemberian' =>  'required',
            'karyawan_id'   =>  'required',
            'nominal_bantuan'   =>  'required',
        ]);

        $data->update([
            'peserta_id'   =>  $request->peserta_id,
            'bantuan'   =>  $request->bantuan,
            'sub_bantuan'   =>  $request->sub_bantuan,
            'keterangan'   =>  $request->keterangan,
            'tgl_pemberian'   =>  date('Y-m-d', strtotime($request->tgl_pemberian)),
            'karyawan_id'   =>  $request->karyawan_id,
            'nominal_bantuan'   =>  $request->nominal_bantuan,
        ]);

        return redirect(route('data-bantuan', $request->peserta_id))->with('success', 'Data Bantuan Berhasil Diupdate.');
    }

    public function destroy(String $id)
    {
        $data = PenerimaBantuan::where('id', $id)->firstOrFail();
        $data->delete();
        return redirect(route('data-bantuan', $data->peserta_id))->with('success', 'Data Bantuan Berhasil Dihapus.');
    }

    public function dokumentasiDataBantuan(String $id)
    {
        $data = PenerimaBantuan::where('id', $id)->firstOrFail();
        return view('data-bantuan.dokumentasi', [
            'title' => 'Data Dokumentasi Penerimaan Bantuan',
            'data' => $data,
            'peserta' => Peserta::all(),
            'documentations' => DokumentasiPenerimaanBantuan::where('penerima_bantuan_id', $data->id)->get()
        ]);
    }

    public function storeDokumentasiBantuan(Request $request)
    {
        $request->validate([
            'foto_dokumentasi' => 'required',
            'foto_dokumentasi.*' => 'required|image|mimes:jpeg,jpg,png',
        ]);

        $files = [];
        if ($request->file('foto_dokumentasi')) {
            foreach ($request->file('foto_dokumentasi') as $key => $file) {
                $file_name = time() . rand(1, 99) . '.' . $file->extension();
                $file->storeAs('dokumentasi/penerima_bantuan/', $file_name);
                $files[]['name'] = $file_name;
            }
        }

        foreach ($files as $key => $file) {
            DokumentasiPenerimaanBantuan::create([
                'penerima_bantuan_id' => $request->penerima_bantuan_id,
                'foto_dokumentasi'  => $file['name']
            ]);
        }

        return redirect()->back()->with('success', 'Data Dokumentasi Penerimaan Bantuan Berhasil Disimpan.');
    }

    public function destoryDokumentasiBantuan(String $id)
    {
        $data = DokumentasiPenerimaanBantuan::where('id', $id)->firstOrFail();
        Storage::delete('dokumentasi/penerima_bantuan/' . $data->foto_dokumentasi);
        $data->delete();
        return redirect()->back()->with('success', 'Foto Dokumentasi Berhasil Dihapus.');
    }

    public function semuaDataBantuan()
    {
        return view('data-bantuan.data-bantuan', [
            'title' => 'Data Peserta Penerima Bantuan',
            'datas' =>  PenerimaBantuan::orderBy('id', 'DESC')->paginate(20)
        ]);
    }
}
