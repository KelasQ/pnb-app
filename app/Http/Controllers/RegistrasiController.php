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
use Illuminate\Support\Facades\Storage;

class RegistrasiController extends Controller
{
    public function index()
    {
        $data_peserta = Peserta::orderBy('id', 'DESC')->paginate(20);
        return view('penerima_bantuan.index', [
            'title'     =>  'Data Penerima Bantuan',
            'registrations'  => $data_peserta
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

    public function store(Request $request)
    {
        $request->validate([
            'layanan_id'                =>  'required',
            'karyawan_id'                =>  'required',
            'tgl_asesmen'               =>  'required',
            'kasus_id'                  =>  'required',
            'klaster_id'                =>  'required',
            'sub_klaster_id'            =>  'required',
            'provinsi_kode'             =>  'required',
            'kota_kode'                 =>  'required',
            'kecamatan_kode'            =>  'required',
            'kelurahan_kode'            =>  'required',
            'alamat_ktp'                =>  'required',
            'alamat_domisili'           =>  'required',
            'nama_ppks'                 =>  'required',
            'nik'                       =>  'required|unique:peserta,nik',
            'no_kk'                     =>  'required|unique:peserta,no_kk',
            'tempat_lahir'              =>  'required',
            'tgl_lahir'                 =>  'required',
            'jenis_kelamin'             =>  'required',
            'agama'                     =>  'required',
            'pendidikan'                =>  'required',
            'pekerjaan'                 =>  'required',
            'penghasilan_per_bulan'     =>  'required',
            'nama_ibu'                  =>  'required',
            'nama_ayah'                 =>  'required',
            'pekerjaan_org_tua'         =>  'required',
            'no_hp_wali'                =>  'required',
            'dtiks'                     =>  'required',
            'bantuan_pernah_diterima'   =>  'required',
            'hasil_asesmen'             =>  'required',
            'rekomendasi'               =>  'required',
            'intervensi'                =>  'required',
            'tgl_pelayanan'             =>  'required',
            'foto_ktp'                  =>  'required|image|mimes:jpeg,jpg,png|max:2048',
            'foto_diri'                 =>  'required|image|mimes:jpeg,jpg,png|max:2048',
            'foto_kk'                   =>  'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        //upload file
        $request->file('foto_ktp')->store('registrasi/ktp/');
        $request->file('foto_diri')->store('registrasi/photo/');
        $request->file('foto_kk')->store('registrasi/kk/');

        Peserta::create([
            'layanan_id'                =>  $request->layanan_id,
            'karyawan_id'               =>  $request->karyawan_id,
            'tgl_asesmen'               =>  date('Y-m-d', strtotime($request->tgl_asesmen)),
            'kasus_id'                  =>  $request->kasus_id,
            'ket_kasus'                 =>  $request->ket_kasus,
            'klaster_id'                =>  $request->klaster_id,
            'sub_klaster_id'            =>  $request->sub_klaster_id,
            'provinsi_kode'             =>  $request->provinsi_kode,
            'kota_kode'                 =>  $request->kota_kode,
            'kecamatan_kode'            =>  $request->kecamatan_kode,
            'kelurahan_kode'            =>  $request->kelurahan_kode,
            'alamat_ktp'                =>  $request->alamat_ktp,
            'alamat_domisili'           =>  $request->alamat_domisili,
            'nama_ppks'                 =>  $request->nama_ppks,
            'nik'                       =>  $request->nik,
            'no_kk'                     =>  $request->no_kk,
            'tempat_lahir'              =>  $request->tempat_lahir,
            'tgl_lahir'                 =>  date('Y-m-d', strtotime($request->tgl_lahir)),
            'jenis_kelamin'             =>  $request->jenis_kelamin,
            'agama'                     =>  $request->agama,
            'pendidikan'                =>  $request->pendidikan,
            'pekerjaan'                 =>  $request->pekerjaan,
            'penghasilan_per_bulan'     =>  $request->penghasilan_per_bulan,
            'nama_ibu'                  =>  $request->nama_ibu,
            'nama_ayah'                 =>  $request->nama_ayah,
            'pekerjaan_org_tua'         =>  $request->pekerjaan_org_tua,
            'no_hp_wali'                =>  $request->no_hp_wali,
            'dtiks'                     =>  $request->dtiks,
            'bantuan_pernah_diterima'   =>  $request->bantuan_pernah_diterima,
            'hasil_asesmen'             =>  $request->hasil_asesmen,
            'rekomendasi'               =>  $request->rekomendasi,
            'intervensi'                =>  $request->intervensi,
            'tgl_pelayanan'             =>  date('Y-m-d', strtotime($request->tgl_pelayanan)),
            'foto_ktp'                  =>  $request->foto_ktp->hashName(),
            'foto_diri'                 =>  $request->foto_diri->hashName(),
            'foto_kk'                   =>  $request->foto_kk->hashName(),
        ]);

        return redirect(route('peserta.index'))->with('success', 'Data Registrasi Berhasil Disimpan.');
    }

    public function show(string $id)
    {
        $data = Peserta::find($id);
        $provinsi = DB::table('wilayah')->where('kode', $data->provinsi_kode)->get();
        $kota = DB::table('wilayah')->where('kode', $data->kota_kode)->get();
        $kecamatan = DB::table('wilayah')->where('kode', $data->kecamatan_kode)->get();
        $kelurahan = DB::table('wilayah')->where('kode', $data->kelurahan_kode)->get();

        $statusTerimaBantuan = DB::table('penerima_bantuan')->where('peserta_id', $id)->count();

        return view('penerima_bantuan.show', [
            'title'   =>  'Detail Data Registrasi Peserta',
            'data'    =>  $data,
            'provinsi' => $provinsi,
            'kota' => $kota,
            'kecamatan' => $kecamatan,
            'kelurahan' => $kelurahan,
            'status_bantuan' => $statusTerimaBantuan,
        ]);
    }

    public function edit(string $id)
    {
        $data = Peserta::find($id);
        dd($data);
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        $data = Peserta::find($id);
        Storage::delete('registrasi/ktp/' . $data->foto_ktp);
        Storage::delete('registrasi/photo/' . $data->foto_diri);
        Storage::delete('registrasi/kk/' . $data->foto_kk);
        $data->delete();
        return redirect(route('peserta.index'))->with('success', 'Data Registrasi Peserta Berhasil Dihapus.');
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
