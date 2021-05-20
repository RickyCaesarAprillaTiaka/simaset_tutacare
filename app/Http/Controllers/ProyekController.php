<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Proyek, App\Status;
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
        return view('dashboard.proyek.show');
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
}
