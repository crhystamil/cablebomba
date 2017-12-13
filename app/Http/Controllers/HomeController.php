<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Datos;

class HomeController extends Controller
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
        return view('home');
    }

    public function search(Request $request){
        $id = $request['ssid'];
        $result = Datos::where('ssid','like', '%'.$id.'%')->select('ssid','password')->take(10)->get();
        return response()->json($result);
    }
}
