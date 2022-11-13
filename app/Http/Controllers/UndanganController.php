<?php

namespace App\Http\Controllers;

use App\Models\Wisuda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UndanganController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $mhs = Wisuda::where('user_id', $id)->first();
        return view('undangan.cetak');
    }
}
