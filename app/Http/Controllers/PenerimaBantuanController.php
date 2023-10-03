<?php

namespace App\Http\Controllers;

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
            'foto_dokumentasi'  =>  'image|mimes:jpeg,jpg,png',
        ]);

        //upload foto dokumentasi
        $request->file('foto_dokumentasi')->store('dokumentasi/peneriam_bantuan/');

        PenerimaBantuan::create([
            'peserta_id'   =>  $request->peserta_id,
            'bantuan'   =>  $request->bantuan,
            'sub_bantuan'   =>  $request->sub_bantuan,
            'keterangan'   =>  $request->keterangan,
            'tgl_pemberian'   =>  date('Y-m-d', strtotime($request->tgl_pemberian)),
            'karyawan_id'   =>  $request->karyawan_id,
            'nominal_bantuan'   =>  $request->nominal_bantuan,
            'foto_dokumentasi'   =>  $request->foto_dokumentasi->hashName(),
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
            'foto_dokumentasi'  =>  'image|mimes:jpeg,jpg,png',
        ]);

        if ($request->hasFile('foto_dokumentasi')) {
            Storage::delete('dokumentasi/peneriam_bantuan/' . $data->foto_dokumentasi);
            $request->file('foto_dokumentasi')->store('dokumentasi/peneriam_bantuan/');
            $data->update([
                'peserta_id'   =>  $request->peserta_id,
                'bantuan'   =>  $request->bantuan,
                'sub_bantuan'   =>  $request->sub_bantuan,
                'keterangan'   =>  $request->keterangan,
                'tgl_pemberian'   =>  date('Y-m-d', strtotime($request->tgl_pemberian)),
                'karyawan_id'   =>  $request->karyawan_id,
                'nominal_bantuan'   =>  $request->nominal_bantuan,
                'foto_dokumentasi'   =>  $request->foto_dokumentasi->hashName(),
            ]);
        } else {
            $data->update([
                'peserta_id'   =>  $request->peserta_id,
                'bantuan'   =>  $request->bantuan,
                'sub_bantuan'   =>  $request->sub_bantuan,
                'keterangan'   =>  $request->keterangan,
                'tgl_pemberian'   =>  date('Y-m-d', strtotime($request->tgl_pemberian)),
                'karyawan_id'   =>  $request->karyawan_id,
                'nominal_bantuan'   =>  $request->nominal_bantuan,
            ]);
        }

        return redirect(route('data-bantuan', $request->peserta_id))->with('success', 'Data Bantuan Berhasil Diupdate.');
    }

    public function destroy(String $id)
    {
        $data = PenerimaBantuan::where('id', $id)->firstOrFail();
        Storage::delete('dokumentasi/peneriam_bantuan/' . $data->foto_dokumentasi);
        $data->delete();
        return redirect(route('data-bantuan', $data->peserta_id))->with('success', 'Data Bantuan Berhasil Dihapus.');
    }
}
