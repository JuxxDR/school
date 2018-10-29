<?php

namespace App\Http\Controllers\Admin;

use App\Model\Grupo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function notifications()
    {
        $grupos = Grupo::all();
        return view('admin.notificar')->with(compact('grupos'));
    }
}
