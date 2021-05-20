<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Barang;
use Spipu\Html2Pdf\Html2Pdf;

class LaporanController extends Controller
{
    public function index()
    {
    	$asset = Barang::all();
      	return view('dashboard.laporan.index', compact('asset'));
    }

    public function pdf()
    {
    	$asset = Barang::all();
    	$docpdf = new Html2Pdf('P', 'A4', 'en');
    	$docpdf->pdf->SetTitle('Laporan Aset');
    	$docpdf->writeHTML(view('dashboard.laporan.pdf', compact('asset')));
    	$docpdf->output('laporan-aset.pdf');
    }
}
