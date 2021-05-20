<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Requests\StatusRequest;
use App\Status;
use Session, Redirect;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = Status::all();
        return view('dashboard.status.index', ['status' => $status]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.status.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StatusRequest $request)
    {
        $status = new Status;
        $status->name = $request->status;
        $status->save();
        Session::flash('message', 'Menambah Status sukses!');
        if ($request->id != 'modal') {
            return Redirect::to('dashboard/status');
        } else {
            return Redirect::back();
        }
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
      $status = status::find($id);
      return view('dashboard.status.edit', compact('status'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StatusRequest $request, $id)
    {
      $status = Status::findOrFail($id);
      $status->name = $request->status;
      $status->save();
      Session::flash('message', 'Mengganti Status sukses!');
      return Redirect::to('dashboard/status');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $status = Status::find($id);
      $status->delete();
      Session::flash('message', 'Menghapus Status Sukses!');
      return Redirect::to('dashboard/status');
    }

    public function addStatus(Request $request)
    {

      $rules     = array(
                    'name'   => 'required|unique:status'
                        );

      $validator = Validator::make($request->all(), $rules);

      if($validator->fails())
      {
          return response()->json([
              'success' => false,
              'errors'   => $validator->errors()->toArray()
              ]);
      }

      $status = Status::create([
          'name' => $request->name
      ]);


      return response()->json([
             'success'  => true,
             'data' => $status
             ]);
    }
}
