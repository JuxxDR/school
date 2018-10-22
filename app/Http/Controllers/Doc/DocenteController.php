<?php

namespace App\Http\Controllers\Doc;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocenteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('docente.index');
    }

    public function account(){
        return view('docente.cuenta');
    }
}
