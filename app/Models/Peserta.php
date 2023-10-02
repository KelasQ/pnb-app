<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    protected $table = 'peserta';
    protected $primaryKey = 'id';
    protected $fillable = [
        'layanan_id',
        'karyawan_id',
        'tgl_asesmen',
        'kasus_id',
        'ket_kasus',
        'klaster_id',
        'sub_klaster_id',
        'provinsi_kode',
        'kota_kode',
        'kecamatan_kode',
        'kelurahan_kode',
        'alamat_ktp',
        'alamat_domisili',
        'nama_ppks',
        'nik',
        'no_kk',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'agama',
        'pendidikan',
        'pekerjaan',
        'penghasilan_per_bulan',
        'nama_ibu',
        'nama_ayah',
        'pekerjaan_org_tua',
        'no_hp_wali',
        'dtiks',
        'bantuan_pernah_diterima',
        'hasil_asesmen',
        'rekomendasi',
        'intervensi',
        'tgl_pelayanan',
        'foto_ktp',
        'foto_diri',
        'foto_kk',
    ];

    public function layanan()
    {
        return $this->belongsTo(Layanan::class);
    }

    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class);
    }

    public function kasus()
    {
        return $this->belongsTo(Kasus::class);
    }

    public function klaster()
    {
        return $this->belongsTo(Klaster::class);
    }

    public function subKlaster()
    {
        return $this->belongsTo(SubKlaster::class);
    }

    public function bantuan()
    {
        return $this->belongsTo(Bantuan::class);
    }
}
