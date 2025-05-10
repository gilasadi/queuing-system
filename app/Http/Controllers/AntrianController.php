<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Antrian;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;

class AntrianController extends Controller
{
    public function index()
    {
        return view('antrian.index');
    }

    public function ambilTiket($jenis)
    {
        $tanggal = Carbon::now()->toDateString();

        // Validasi jenis
        if (!in_array($jenis, ['registrasi', 'cs'])) {
            abort(404);
        }

        $huruf = $jenis === 'registrasi' ? 'A' : 'B';

        $last = Antrian::where('jenis', $jenis)
            ->where('tanggal', $tanggal)
            ->orderByDesc('id')
            ->first();

        $lastNumber = $last ? intval(substr($last->nomor_antrian, 1)) : 0;
        $newNumber = str_pad($lastNumber + 1, 3, '0', STR_PAD_LEFT);
        $nomorAntrian = $huruf . $newNumber;

        // Simpan ke DB
        $antrian = Antrian::create([
            'jenis' => $jenis,
            'nomor_antrian' => $nomorAntrian,
            'tanggal' => $tanggal,
        ]);

        // Tampilkan PDF
        $pdf = Pdf::loadView('antrian.tiket', [
            'nomor' => $nomorAntrian,
            'tanggal' => Carbon::now()->translatedFormat('l, d F Y'),
            'instansi' => 'Kantor Pelayanan Publik XYZ',
        ]);

        return $pdf->stream('tiket-' . $nomorAntrian . '.pdf');
    }
}
