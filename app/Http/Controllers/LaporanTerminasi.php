<?php

namespace App\Http\Controllers;

use App\Models\Tindakan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\App;

class LaporanTerminasi extends Controller
{
    public function index()
    {
        return view('laporan.terminasi', [
            'title' => 'Data Laporan Terminasi',
            'datas' => Tindakan::where('tindakan', 'Terminasi')->orderBy('id', 'DESC')->paginate(20),
        ]);
    }

    public function dokumenTerminasi(String $id)
    {
        $data = Tindakan::where('id', $id)->firstOrFail();
        $usia = date('Y') - date('Y', strtotime($data->peserta->tgl_lahir));
        $sk = explode(',', $data->syarat_dan_ketentuan);

        // return view('laporan.dokumen-terminasi', [
        //     'title' => 'Dokumen Terminasi',
        //     'data'  =>  $data,
        // ]);

        // $pdf = Pdf::loadView('laporan.dokumen-terminasi', ['data' => $data]);
        // return $pdf->download('form-terminasi.pdf');
        // return $pdf->stream();

        $html = response()->view('laporan.dokumen-terminasi', ['data' => $data, 'usia' => $usia, 'sk' => $sk])->getContent();
        $pdf = Pdf::loadHTML($html);
        return $pdf->download('form-terminasi.pdf');
    }
}
