<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Barang, App\Proyek, App\MaterialProyek, App\ScheduleProyek, App\ProgressProyek;
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

	public function pdfProyek($id_proyek)
	{
		$proyek = Proyek::findOrFail($id_proyek);
		$material_proyek = MaterialProyek::where('id_proyek', $id_proyek)->get();
		$schedule_proyek = ScheduleProyek::where('id_proyek', $id_proyek)->get();
		$progress_proyek = ProgressProyek::where('id_proyek', $id_proyek)->get();
		$docpdf = new Html2Pdf('P', 'A4', 'en');
		$docpdf->pdf->SetTitle('Laporan '.$proyek->nama_proyek);
		$docpdf->writeHTML(view('dashboard.laporan.pdfProyek', compact('proyek', 'material_proyek', 'schedule_proyek', 'progress_proyek')));
    	$docpdf->output('laporan-'.$proyek->nama_proyek.'.pdf');
	}
}
