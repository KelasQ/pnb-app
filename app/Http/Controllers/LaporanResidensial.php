<?php

namespace App\Http\Controllers;

use App\Models\Tindakan;
use Illuminate\Http\Request;

class LaporanResidensial extends Controller
{
    public function index($data = [])
    {
        return view('laporan.residensial', [
            'title' => 'Data Laporan Residensial',
            'data' => $data,
        ]);
    }

    public function getDataLaporan(Request $request)
    {
        $data = Tindakan::where('tindakan', $request->tindakan)->paginate(20);
        return $this->index(compact('data'));
    }
}
