<?php

namespace App\Http\Controllers;

use App\Models\Wisuda;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ScanController extends Controller
{
    public function index()
    {
        return view('scan.index');
    }

    public function update($id)
    {
        $wisuda = Wisuda::findOrFail($id);
        $wisuda->kehadiran = 'ya';
        $wisuda->save();
        Alert::success('Mahasiswa Hadir', $wisuda->nim . ' - ' . ucwords($wisuda->nama_lengkap));
        return redirect()->route('scan.index')->with('status', 'Mahasiswa Hadir.');
    }
}
