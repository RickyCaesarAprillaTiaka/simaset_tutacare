<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Cabang, App\Jenis;
use App\Status, App\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cabang = Cabang::count();
        $jenis = Jenis::count();
        $status = Status::count();
        $user = User::count();
        return view('dashboard.index', compact('cabang', 'jenis', 'status', 'user'));
    }
}
