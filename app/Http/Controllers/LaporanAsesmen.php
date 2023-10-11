<?php

namespace App\Http\Controllers;

use App\Models\Kasus;
use App\Models\Klaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanAsesmen extends Controller
{
    public function index($data = [])
    {
        return view('laporan.asesmen', [
            'title' => 'Data Laporan Asesmen',
            'data' => $data,
            'provinsi'  => DB::select("SELECT * FROM wilayah WHERE kode = LEFT(kode,2) ORDER BY nama"),
            'kasus' => Kasus::all(),
            'klaster' => Klaster::all(),
        ]);
    }

    public function lapAsesmenByKota(Request $request)
    {
        $data = DB::table('peserta')
            ->join('penerima_bantuan', 'peserta.id', '=', 'penerima_bantuan.peserta_id')
            ->select('peserta.*', 'penerima_bantuan.bantuan', 'penerima_bantuan.nominal_bantuan')
            ->where('peserta.kota_kode', $request->kota)
            ->get();

        $html = response()->view('laporan.dokumen-asesmen', [
            'data' => $data,
            'jenis_laporan' => 'Berdasarkan Kab/Kota',
        ])->getContent();

        $pdf = Pdf::loadHTML($html)->setPaper('legal', 'landscape');
        return $pdf->download('lap-asesmen.pdf');
    }

    public function lapAsesmenByKasus(Request $request)
    {
        $data = DB::table('peserta')
            ->join('penerima_bantuan', 'peserta.id', '=', 'penerima_bantuan.peserta_id')
            ->select('peserta.*', 'penerima_bantuan.bantuan', 'penerima_bantuan.nominal_bantuan')
            ->where('peserta.kasus_id', $request->kasus_id)
            ->get();

        $html = response()->view('laporan.dokumen-asesmen', [
            'data' => $data,
            'jenis_laporan' => 'Berdasarkan Sumber Kasus',
        ])->getContent();

        $pdf = Pdf::loadHTML($html)->setPaper('legal', 'landscape');
        return $pdf->download('lap-asesmen.pdf');
    }

    public function lapAsesmenByKlaster(Request $request)
    {
        $data = DB::table('peserta')
            ->join('penerima_bantuan', 'peserta.id', '=', 'penerima_bantuan.peserta_id')
            ->select('peserta.*', 'penerima_bantuan.bantuan', 'penerima_bantuan.nominal_bantuan')
            ->where('peserta.klaster_id', $request->klaster_id)
            ->get();

        $html = response()->view('laporan.dokumen-asesmen', [
            'data' => $data,
            'jenis_laporan' => 'Berdasarkan Klaster',
        ])->getContent();

        $pdf = Pdf::loadHTML($html)->setPaper('legal', 'landscape');
        return $pdf->download('lap-asesmen.pdf');
    }

    public function lapAsesmenByAlatBantu(Request $request)
    {
        $data = DB::table('peserta')
            ->join('penerima_bantuan', 'peserta.id', '=', 'penerima_bantuan.peserta_id')
            ->select('peserta.*', 'penerima_bantuan.bantuan', 'penerima_bantuan.nominal_bantuan')
            ->where('penerima_bantuan.sub_bantuan', $request->alatbantu)
            ->get();

        $html = response()->view('laporan.dokumen-asesmen', [
            'data' => $data,
            'jenis_laporan' => 'Berdasarkan Jenis Alat Bantu',
        ])->getContent();

        $pdf = Pdf::loadHTML($html)->setPaper('legal', 'landscape');
        return $pdf->download('lap-asesmen.pdf');
    }
}
