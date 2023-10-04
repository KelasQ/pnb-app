<?php

namespace App\Http\Controllers;

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
            'dokumentasi'  =>  'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        //upload foto
        $request->file('dokumentasi')->store('dokumentasi/ska');

        SKA::create([
            'jenis_ska'   =>  $request->jenis_ska,
            'deskripsi'   =>  $request->deskripsi,
            'dokumentasi' =>  $request->dokumentasi->hashName(),
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
            'dokumentasi' =>  'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        if ($request->hasFile('dokumentasi')) {
            Storage::delete('dokumentasi/ska/' . $ska->dokumentasi);
            $request->file('foto')->store('dokumentasi/ska/');
            $ska->update([
                'jenis_ska'   =>  $request->jenis_ska,
                'deskripsi'   =>  $request->deskripsi,
                'dokumentasi' =>  $request->dokumentasi->hashName(),
            ]);
        } else {
            $ska->update([
                'jenis_ska'   =>  $request->jenis_ska,
                'deskripsi'   =>  $request->deskripsi,
            ]);
        }
        return redirect(route('ska.index'))->with('success', 'Data SKA Berhasil Diupdate.');
    }

    public function destroy(SKA $ska)
    {
        Storage::delete('dokumentasi/ska/' . $ska->dokumentasi);
        $ska->delete();
        return redirect(route('ska.index'))->with('success', 'Data SKA Berhasil Dihapus.');
    }
}
