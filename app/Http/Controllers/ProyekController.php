<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Proyek, App\Status, App\Material, App\MaterialProyek, App\ScheduleProyek;
use Session, Redirect;

class ProyekController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proyek = Proyek::all();
        return view('dashboard.proyek.index', compact('proyek'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RespoSnse
     */
    public function create()
    {
        $status_proyek   = [''=>'--Pilih Status--'] + Status::pluck('name', 'id')->all();
        return view('dashboard.proyek.create', compact('status_proyek'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $proyek = new Proyek;
        $proyek->nama_proyek = $request->nama_proyek;
        $proyek->pemegang_proyek = $request->pemegang_proyek;
        $proyek->lokasi_proyek = $request->lokasi_proyek;
        $proyek->owner_proyek = $request->owner_proyek;
        $proyek->status_proyek = $request->status_proyek;
        $proyek->save();
        Session::flash('message', 'Menambah Proyek sukses!');
        return Redirect::to('dashboard/proyek');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $proyek = Proyek::findOrFail($id);
        return view('dashboard.proyek.show', compact('proyek'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $proyek = Proyek::find($id);
        $status_proyek   = [''=>'--Pilih Status--'] + Status::pluck('name', 'id')->all();
        return view('dashboard.proyek.edit', compact('proyek', 'status_proyek'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $proyek = Proyek::findOrFail($id);
        $proyek->nama_proyek = $request->nama_proyek;
        $proyek->pemegang_proyek = $request->pemegang_proyek;
        $proyek->lokasi_proyek = $request->lokasi_proyek;
        $proyek->owner_proyek = $request->owner_proyek;
        $proyek->status_proyek = $request->status_proyek;
        $proyek->save();
        Session::flash('message', 'Mengganti Proyek sukses!');
        return Redirect::to('dashboard/proyek');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $proyek = Proyek::find($id);
        $proyek->delete();
        Session::flash('message', 'Menghapus Proyek Sukses!');
        return Redirect::to('dashboard/proyek');
    }

    public function indexMaterialProyek($id_proyek)
    {
        $proyek = Proyek::findOrFail($id_proyek);
        $material_proyek = MaterialProyek::where('id_proyek', $id_proyek)->get();
        return view('dashboard.proyek.material.index', compact('proyek', 'material_proyek'));
    }

    public function createMaterialProyek($id_proyek)
    {
        $proyek = Proyek::findOrFail($id_proyek);
        $material = Material::all();
        return view('dashboard.proyek.material.create', compact('proyek', 'material'));
    }

    public function storeMaterialProyek(Request $request, $id_proyek)
    {
        foreach ($request->material as $key => $value) {
            $material_proyek = new MaterialProyek;
            $material_proyek->id_material = $value;
            $material_proyek->jumlah = $request->jumlah_material[array_search($value, $request->material)];
            $material_proyek->id_proyek = $id_proyek;
            $material_proyek->save();
        }
        Session::flash('message', 'Menambah Material Proyek Sukses!');
        return Redirect::to('dashboard/proyek/'.$id_proyek.'/material');
    }

    public function editMaterialProyek($id_proyek, $id_material)
    {
        $proyek = Proyek::findOrFail($id_proyek);
        $material_proyek = MaterialProyek::findOrFail($id_material);
        return view('dashboard.proyek.material.edit', compact('proyek', 'material_proyek'));
    }
    
    public function updateMaterialProyek(Request $request, $id_proyek, $id_material)
    {
        $material_proyek = MaterialProyek::findOrFail($id_material);
        $material_proyek->jumlah = $request->jumlah;
        $material_proyek->save();
        Session::flash('message', 'Mengganti Material Proyek Sukses!');
        return Redirect::to('dashboard/proyek/'.$id_proyek.'/material');
    }

    public function destroyMaterialProyek($id_proyek, $id_material)
    {
        $material_proyek = MaterialProyek::findOrFail($id_material);
        $material_proyek->delete();
        Session::flash('message', 'Menghapus Material Proyek Sukses!');
        return Redirect::to('dashboard/proyek/'.$id_proyek.'/material');
    }

    public function indexScheduleProyek($id_proyek)
    {
        $proyek = Proyek::findOrFail($id_proyek);
        $schedule_proyek = ScheduleProyek::where('id_proyek', $id_proyek)->get();
        return view('dashboard.proyek.schedule.index', compact('proyek', 'schedule_proyek'));
    }

    public function createScheduleProyek($id_proyek)
    {
        $proyek = Proyek::findOrFail($id_proyek);
        return view('dashboard.proyek.schedule.create', compact('proyek', 'id_proyek'));
    }

    public function storeScheduleProyek(Request $request, $id_proyek)
    {
        $schedule_proyek = new ScheduleProyek;
        $schedule_proyek->tanggal_mulai = date('Y-m-d', strtotime($request->tanggal_mulai));
        $schedule_proyek->tanggal_selesai = date('Y-m-d', strtotime($request->tanggal_selesai));
        $schedule_proyek->schedule = $request->schedule;
        $schedule_proyek->id_proyek = $id_proyek;
        $schedule_proyek->save();
        Session::flash('message', 'Menambah Material Schedule Sukses!');
        return Redirect::to('dashboard/proyek/'.$id_proyek.'/schedule');
    }

    public function editScheduleProyek($id_proyek, $id_schedule)
    {
        $proyek = Proyek::findOrFail($id_proyek);
        $schedule_proyek = ScheduleProyek::findOrFail($id_schedule);
        return view('dashboard.proyek.schedule.edit', compact('proyek', 'schedule_proyek'));
    }
    
    public function updateScheduleProyek(Request $request, $id_proyek, $id_schedule)
    {
        $schedule_proyek = ScheduleProyek::findOrFail($id_schedule);
        $schedule_proyek->tanggal_mulai = date('Y-m-d', strtotime($request->tanggal_mulai));
        $schedule_proyek->tanggal_selesai = date('Y-m-d', strtotime($request->tanggal_selesai));
        $schedule_proyek->save();
        Session::flash('message', 'Mengganti Schedule Proyek Sukses!');
        return Redirect::to('dashboard/proyek/'.$id_proyek.'/schedule');
    }

    public function destroyScheduleProyek($id_proyek, $id_schedule)
    {
        $schedule_proyek = ScheduleProyek::findOrFail($id_schedule);
        $schedule_proyek->delete();
        Session::flash('message', 'Menghapus Schedule Proyek Sukses!');
        return Redirect::to('dashboard/proyek/'.$id_proyek.'/schedule');
    }

    public function indexProgressProyek()
    {
        
    }

    public function createProgressProyek()
    {
        
    }

    public function storeProgressProyek()
    {
        
    }

    public function editProgressProyek($id)
    {
        
    }
    
    public function updateProgressProyek(Request $request, $id)
    {
        
    }

    public function destroyProgressProyek($id)
    {
        
    }
}
