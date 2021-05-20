<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\CabangRequest;
use App\Cabang;
use Session, Redirect, Validator;

class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cabang = Cabang::all();
        return view('dashboard.cabang.index', ['cabang' => $cabang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.cabang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CabangRequest $request)
    {
        $cabang = new Cabang;
        $cabang->name = $request->cabang;
        $cabang->save();
        Session::flash('message', 'Menambah Cabang sukses!');
        return Redirect::to('dashboard/cabang');
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
      $cabang = Cabang::find($id);
      return view('dashboard.cabang.edit', compact('cabang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CabangRequest $request, $id)
    {
      $cabang = Cabang::findOrFail($id);
      $cabang->name = $request->cabang;
      $cabang->save();
      Session::flash('message', 'Mengganti Cabang sukses!');
      return Redirect::to('dashboard/cabang');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $cabang = Cabang::find($id);
      $cabang->delete();
      Session::flash('message', 'Menghapus Cabang Sukses!');
      return Redirect::to('dashboard/cabang');
    }

    public function addCabang(Request $request)
    {

      $rules     = array(
                          'name'   => 'required|unique:cabang'
                        );

      $validator = Validator::make($request->all(), $rules);

      if($validator->fails())
      {
          return response()->json([
              'success' => false,
              'errors'   => $validator->errors()->toArray()
              ]);
      }

      $cabang = Cabang::create([
          'name' => $request->name
      ]);


      return response()->json([
             'success'  => true,
             'data' => $cabang
             ]);
    }
}
