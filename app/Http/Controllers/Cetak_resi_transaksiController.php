<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Booking;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use PhpOffice\PhpWord\PhpWord;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Http\Controllers\Controller;

// use PhpOffice\PhpWord\Writer\PDF as WriterPDF;

class Cetak_resi_transaksiController extends Controller
{

    public function index()
    {
    $user = User::orderBy('created_at','DESC')->simplePaginate(10);
    return view('report_user.index',compact('user'));
    }

    public function cetakPDF(string $id)
    {
        $pembelian = Pembayaran::findOrfail($id);
        $pdf = Pdf::loadview('admin_master.user_sup.cetak_resi.cetak_resi_full', compact('pembelian'));

        return $pdf->stream();
    }

    public function cetakPDF_booking(string $id)
    {
        $booking = Booking::findOrfail($id);
        $pdf = Pdf::loadview('admin_master.user_sup.cetak_bukti_resi.cetak_bukti_resi_full', compact('booking'));

        return $pdf->stream();
    }

    public function cetakPDFanime()
    {
        $R_animeku = Pembayaran::orderby('created_at','DESC')->get();

        $pdf = Pdf::loadview('report_animeku.report_animeku', compact('R_animeku'));

            // //Set timeout
            // $pdf->setTimeout(300);

        // return $R_user;
        return $pdf->stream();
    }

}
