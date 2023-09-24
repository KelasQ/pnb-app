<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KaryawanController extends Controller
{
    public function index(Request $request)
    {
        return view('karyawan.index', [
            'title'         =>  'Data Karyawan',
            'karyawans'     =>  Karyawan::orderBy('id', 'DESC')->paginate(20)
        ]);
    }

    public function create()
    {
        return view('karyawan.create', [
            'karyawan'    =>  new Karyawan,
            'submit'      => 'Simpan',
            'title'       => 'Tambah Data Karyawan'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nik'      =>  'required',
            'nama'     =>  'required',
            'email'    =>  'required|email|unique:users,email',
            'telp'     =>  'required',
            'jabatan'  =>  'required',
            'foto'     =>  'required|image|mimes:jpeg,jpg,png|max:2048',
            'alamat'   =>  'required'
        ]);

        //upload foto
        $request->file('foto')->store('karyawan');

        Karyawan::create([
            'nik'     =>  $request->nik,
            'nama'    =>  $request->nama,
            'email'   =>  $request->email,
            'telp'    =>  $request->telp,
            'jabatan' =>  $request->jabatan,
            'foto'    =>  $request->foto->hashName(),
            'alamat'  =>  $request->alamat,
        ]);

        return redirect(route('karyawan.index'))->with('success', 'Data Karyawan Berhasil Disimpan.');
    }

    public function show(Karyawan $karyawan)
    {
        return view('karyawan.show', [
            'karyawan'    =>  $karyawan,
            'title'       => 'Detail Data Karyawan'
        ]);
    }

    public function edit(Karyawan $karyawan)
    {
        return view('karyawan.edit', [
            'title'     =>  'Update Data Karyawan',
            'submit'    =>  'Update',
            'karyawan'  =>  $karyawan
        ]);
    }

    public function update(Request $request, Karyawan $karyawan)
    {
        if ($request->email === $karyawan->email) $validasi = 'required|email';
        $request->validate([
            'nik'     =>  'required',
            'nama'    =>  'required',
            'email'   =>  $validasi,
            'telp'    =>  'required',
            'jabatan' =>  'required',
            'foto'    =>  'image|mimes:jpeg,jpg,png|max:2048',
            'alamat'  =>  'required',
        ]);

        if ($request->hasFile('foto')) {
            Storage::delete('karyawan/' . $karyawan->foto);
            $request->file('foto')->store('karyawan');
            $karyawan->update([
                'nik'     =>  $request->nik,
                'nama'    =>  $request->nama,
                'email'   =>  $request->email,
                'telp'    =>  $request->telp,
                'jabatan' =>  $request->jabatan,
                'foto'    =>  $request->foto->hashName(),
                'alamat'  =>  $request->alamat,
            ]);
        } else {
            $karyawan->update([
                'nik'     =>  $request->nik,
                'nama'    =>  $request->nama,
                'email'   =>  $request->email,
                'telp'    =>  $request->telp,
                'jabatan' =>  $request->jabatan,
                'alamat'  =>  $request->alamat,
            ]);
        }
        return redirect(route('karyawan.index'))->with('success', 'Data Karyawan Berhasil Diupdate.');
    }

    public function destroy(Karyawan $karyawan)
    {
        Storage::delete('karyawan/' . $karyawan->foto);
        $karyawan->delete();
        return redirect(route('karyawan.index'))->with('success', 'Data Karyawan Berhasil Dihapus.');
    }
}
