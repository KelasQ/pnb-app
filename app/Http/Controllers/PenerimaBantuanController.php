<?php

namespace App\Http\Controllers;

use App\Models\Bantuan;
use App\Models\Karyawan;
use App\Models\Kasus;
use App\Models\Klaster;
use App\Models\Layanan;
use App\Models\Peserta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PenerimaBantuanController extends Controller
{
    public function index()
    {
        $data_registrasi = Peserta::orderBy('id', 'DESC')->paginate(20);
        return view('penerima_bantuan.index', [
            'title'     =>  'Data Penerima Bantuan',
            'registrations'  => $data_registrasi
        ]);
    }

    public function create()
    {
        return view('penerima_bantuan.create', [
            'title'     =>  'Input Data Penerima Bantuan',
            'services'  =>  Layanan::all(),
            'employees' =>  Karyawan::all(),
            'cases'     =>  Kasus::all(),
            'klasters'  =>  Klaster::all(),
            'bantuans'  =>  Bantuan::all(),
            'provinsi'  => DB::select("SELECT * FROM wilayah WHERE kode = LEFT(kode,2) ORDER BY nama")
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

    public function getDataKabupaten(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::select("SELECT * FROM wilayah WHERE LEFT(kode,2) = '{$request->kode}' AND CHAR_LENGTH(kode) = '5' ORDER BY nama");
            return response()->json($data);
        }
    }

    public function getDataKecamatan(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::select("SELECT * FROM wilayah WHERE LEFT(kode,5) = '{$request->kode}' AND CHAR_LENGTH(kode) = '8' ORDER BY nama");
            return response()->json($data);
        }
    }
    public function getDataKelurahan(Request $request)
    {
        if ($request->ajax()) {
            $data = DB::select("SELECT * FROM wilayah WHERE LEFT(kode,8) = '{$request->kode}' AND CHAR_LENGTH(kode) = '13' ORDER BY nama");
            return response()->json($data);
        }
    }
}
