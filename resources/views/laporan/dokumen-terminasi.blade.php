<!DOCTYPE html>
<html lang="en">

<head>
    <link class="js-stylesheet" href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <title>Form Terminasi</title>
    <style>
        .w-250 {
            width: 250px !important;
        }

        .lh {
            line-height: 1.5 !important;
        }

        .w-620 {
            width: 620px !important;
        }

        .w-50 {
            width: 50px !important;
        }
    </style>
</head>

<body class="bg-white">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2">
                <img src="{{ asset('logo.jpg') }}" style="width: 80px;">
            </div>
            <div class="col-md-8 text-center" style="margin-top: -90px; margin-left: 20px;">
                <h3>KEMENTERIAN SOSIAL REPUBLIK INDONESIA <br> SENTRA “BAHAGIA” DI MEDAN</h3>
                <p>
                    Jalan Williem Iskandar 377 Medan 20222 Telepon/Fax : (061) 6613305
                    <br>
                    Email : brsodh.bahagia@gmail.com Laman : https://bahagia.kemsos.go.id
                </p>
            </div>
        </div>
        <hr style="border: 2px solid #000;">
        <div class="row">
            <div class="col-md-12 text-center">
                <strong>FORM TERMINASI</strong>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                <table class="table lh">
                    <tr>
                        <td class="w-250">Yang bertanda tangan dibawah ini :</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td class="w-250">Nama Lengkap</td>
                        <td>:</td>
                        <td>{{ $data->peserta->nama_ppks }}</td>
                    </tr>
                    <tr>
                        <td class="w-250">Usia</td>
                        <td>:</td>
                        <td>{{ $usia }} Tahun</td>
                    </tr>
                    <tr>
                        <td class="w-250">Alamat Asal</td>
                        <td>:</td>
                        <td>{{ $data->peserta->alamat_ktp }}</td>
                    </tr>
                    <tr>
                        <td class="w-250">Nomor yang bisa dihubungi</td>
                        <td>:</td>
                        <td>{{ $data->peserta->no_hp_wali }}</td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                <p class="text-justify lh">
                    Telah mendapatkan layanan rehabilitasi sosial di Sentra "Bahagia" di Medan sejak tanggal
                    ................................ s/d ................................ Layanan yang telah saya terima
                    di
                    Sentra "Bahagia" di
                    Medan sebagai berikut :
                </p>
                <ol class="lh" style="margin-top: -10px; margin-left: -10px;">
                    <li>Tinggal di asrama Sentra "Bahagia" di Medan;</li>
                    <li>Mendapatkan kebutuhan dasar berupa tempat untuk tidur, pakaian, makan, perlengkapan mandi dan
                        kesehatan dasar lainnya;</li>
                    <li>Melaksanakan kegiatan layanan yang tersedia di Sentra "Bahagia" di Medan.</li>
                </ol>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                <p class="text-justify lh">
                    Dengan ini menyatakan berhenti mendapatkan layanan Sentra, sehingga keputusan terminasi ini
                    dilakukan
                    dengan alasan :
                </p>
                <ul type="a" style="margin-top: -10px;" class="lh">
                    <table>
                        <tr>
                            <td class="w-620">
                                <li>Telah selesai menerima program layanan di Sentra "Bahagia" di
                                    Medan</li>
                            </td>
                            <td>
                                @if (in_array('Telah Menerima Layanan', $sk))
                                    <span>
                                        ( <img src="{{ asset('check.png') }}" style="width: 20px; margin-bottom: -8px;">
                                        )
                                    </span>
                                @else
                                    <p>( )</p>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="w-620">
                                <li>Atas permintaan sendiri dengan alasan :
                                    {{ $data->alasan_terminasi }}</li>
                            </td>
                            <td>
                                @if (in_array('Permintaan Sendiri', $sk))
                                    <span>
                                        ( <img src="{{ asset('check.png') }}" style="width: 20px; margin-bottom: -8px;">
                                        )
                                    </span>
                                @else
                                    <p>( )</p>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="w-620">
                                <li>Melakukan pelanggaran terhadap aturan peraturan yang ada di Sentra
                                    "Bahagia" di Medan</li>
                            </td>
                            <td>
                                @if (in_array('Pernah Melakukan Pelanggaran', $sk))
                                    <span>
                                        ( <img src="{{ asset('check.png') }}" style="width: 20px; margin-bottom: -8px;">
                                        )
                                    </span>
                                @else
                                    <p>( )</p>
                                @endif
                            </td>
                            </td>
                        </tr>
                    </table>
                </ul>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-md-12">
                <p class="text-justify lh">
                    Segala sesuatu yang terjadi atas diri saya setelah keluar dari Sentra "Bahagia" di Medan adalah
                    tanggung jawab saya.
                </p>
                <p class="text-justify lh">
                    Demikian pernyataan ini ditanda tangani dengan sebenar-benarnya atas kesadaran sendiri tanpa paksaan
                    dari pihak manapun.
                </p>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-12">
                <table class="table">
                    <tr>
                        <td class="w-50 text-center"></td>
                        <td class="w-50 text-center">Medan, ..........................................</td>
                    </tr>
                    <tr>
                        <td class="w-50 text-center">
                            Pekerja Sosial, <br><br><br><br>
                            ( .......................................... )
                        </td>
                        <td class="w-50 text-center">
                            Yang membuat pernyataan, <br><br><br><br>
                            ( {{ $data->peserta->nama_ppks }} )
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
