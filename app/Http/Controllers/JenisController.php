<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\JenisRequest;
use App\Jenis;
use Session, Redirect, Validator;

class JenisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jenis = Jenis::all();
        return view('dashboard.jenis.index', ['jenis' => $jenis]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.jenis.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(JenisRequest $request)
    {
        $jenis = new Jenis;
        $jenis->name = $request->jenis;
        $jenis->save();
        Session::flash('message', 'Menambah Jenis sukses!');
        return Redirect::to('dashboard/jenis');
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
      $jenis = jenis::find($id);
      return view('dashboard.jenis.edit', compact('jenis'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(JenisRequest $request, $id)
    {
      $jenis = Jenis::findOrFail($id);
      $jenis->name = $request->jenis;
      $jenis->save();
      Session::flash('message', 'Mengganti Jenis sukses!');
      return Redirect::to('dashboard/jenis');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $jenis = Jenis::find($id);
      $jenis->delete();
      Session::flash('message', 'Menghapus Jenis Sukses!');
      return Redirect::to('dashboard/jenis');
    }

    public function addJenis(Request $request)
    {

      $rules     = array(
                          'name'   => 'required|unique:jenis'
                        );

      $validator = Validator::make($request->all(), $rules);

      if($validator->fails())
      {
          return response()->json([
              'success' => false,
              'errors'   => $validator->errors()->toArray()
              ]);
      }

      $jenis = Jenis::create([
          'name' => $request->name
      ]);


      return response()->json([
             'success'  => true,
             'data' => $jenis
             ]);
    }
}
