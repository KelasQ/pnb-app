<?php

namespace App\Http\Controllers;

use App\Models\Tindakan;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class LaporanResidensial extends Controller
{
    public function index($data = [], $tindakan = '')
    {
        return view('laporan.residensial', [
            'title' => 'Data Laporan Residensial',
            'data' => $data,
            'tindakan' => $tindakan,
        ]);
    }

    public function getDataLaporan(Request $request)
    {
        $data = Tindakan::where('tindakan', $request->tindakan)->groupBy('peserta_id')->orderBy('id', 'DESC')->paginate(20);
        return $this->index($data, $request->tindakan);
    }

    public function dokumenResidensial($peserta_id, $tindakan)
    {
        $jenisTindakan = str_replace('&', '/', $tindakan);
        $item = Tindakan::where('peserta_id', $peserta_id)->firstOrFail();
        $data = Tindakan::where('peserta_id', $peserta_id)->where('tindakan', $jenisTindakan)->get();
        $peserta = $item->peserta->nama_ppks;
        $layanan = $item->tindakan;

        $html = response()->view('laporan.dokumen-residensial', [
            'title' => 'Laporan Residensial',
            'data' => $data,
            'peserta' => $peserta,
            'layanan' => $layanan,
        ])->getContent();
        $pdf = Pdf::loadHTML($html)->setPaper('legal', 'landscape');
        return $pdf->download('lap-residensial.pdf');
    }
}
