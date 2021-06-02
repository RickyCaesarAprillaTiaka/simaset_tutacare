<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Material, App\MaterialProyek;
use Session, Redirect;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $material = Material::all();
        return view('dashboard.material.index', compact('material'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.material.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $material = new Material;
        $material->nama_material = $request->nama_material;
        $material->save();
        Session::flash('message', 'Menambah Material sukses!');
        return Redirect::to('dashboard/material');
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
        $material = Material::find($id);
        return view('dashboard.material.edit', compact('material'));
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
        $material = Material::findOrFail($id);
        $material->nama_material = $request->nama_material;
        $material->save();
        Session::flash('message', 'Mengganti Material sukses!');
        return Redirect::to('dashboard/material');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $material = Material::find($id);
        if (MaterialProyek::where('id_material', $id)->count() > 0) {
            Session::flash('message', 'Material '.$material->name.' sedang dipakai!');
            return Redirect::to('dashboard/material');
        } else {
            $material->delete();
            Session::flash('message', 'Menghapus Material Sukses!');
            return Redirect::to('dashboard/material');
        }   
    }
}
