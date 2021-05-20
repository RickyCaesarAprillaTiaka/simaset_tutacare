<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Barang, App\Jenis;
use App\Cabang, App\Status;
use Auth, Redirect, Session;

class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $asset = Barang::all();
      return view('dashboard.asset.index', compact('asset'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $jenis = [''=>'--Pilih Jenis--'] + Jenis::pluck('name', 'id')->all();
        $cabang = [''=>'--Pilih Cabang--'] + Cabang::pluck('name', 'id')->all();
        $status = [''=>'--Pilih Status--'] + Status::pluck('name', 'id')->all();
        return view('dashboard.asset.create', compact('jenis', 'cabang', 'status'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $asset = new Barang;
        $asset->hardware_type = $request->hardware_type;
        $asset->user_id = Auth::user()->id;
        $asset->jenis_id = $request->jenis_id;
        $asset->serial_number = $request->serial_number;
        $asset->tanggal_pembelian = date("Y-m-d", strtotime($request->tanggal_pembelian));
        $asset->jangka_waktu = date("Y-m-d", strtotime($request->jangka_waktu));
        $asset->harga = $request->harga;
        $asset->cabang_id = $request->cabang_id;
        $asset->status_id = $request->status_id;
        $asset->save();
        Session::flash('message', 'Menambah Asset sukses!');
        return Redirect::to('dashboard/asset');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $asset = Barang::find($id);
      $jenis = [''=>'--Please Select--'] + Jenis::pluck('name', 'id')->all();
      $cabang = [''=>'--Pilih Cabang--'] + Cabang::pluck('name', 'id')->all();
      $status = [''=>'--Pilih Status--'] + Status::pluck('name', 'id')->all();
      return view('dashboard.asset.edit', compact('asset', 'jenis', 'cabang', 'status'));
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
        $asset = Barang::find($id);
        $asset->hardware_type = $request->hardware_type;
        $asset->user_id = Auth::user()->id;
        $asset->jenis_id = $request->jenis_id;
        $asset->serial_number = $request->serial_number;
        $asset->tanggal_pembelian = date("Y-m-d", strtotime($request->tanggal_pembelian));
        $asset->jangka_waktu = date("Y-m-d", strtotime($request->jangka_waktu));
        $asset->harga = $request->harga;
        $asset->cabang_id = $request->cabang_id;
        $asset->status_id = $request->status_id;
        $asset->save();
        Session::flash('message', 'Merubah Asset sukses!');
        return Redirect::to('dashboard/asset');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $asset = Barang::find($id);
      $asset->delete();
      Session::flash('message', 'Menghapus Asset Sukses!');
      return Redirect::to('dashboard/asset');
    }
}
