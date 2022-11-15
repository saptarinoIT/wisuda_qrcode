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
        $wisuda = Wisuda::find($id);
        $nim = substr($id, -9, null);
        if ($wisuda) {
            $wisuda->kehadiran = 'ya';
            $wisuda->save();
            Alert::success('Mahasiswa Hadir', $wisuda->nim . ' - ' . ucwords($wisuda->nama_lengkap));
            return redirect()->route('scan.index')->with('status', 'Mahasiswa Hadir.');
        } elseif ($id == 'orangtua_' . $nim) {
            // dd($nim);
            $wisuda = Wisuda::find($nim);
            $wisuda->orangtua = 'ya';
            $wisuda->save();
            Alert::success('Orang Tua Mahasiswa Hadir', $wisuda->nim . ' - ' . ucwords($wisuda->nama_lengkap));
            return redirect()->route('scan.index')->with('status', 'Mahasiswa Hadir.');
        } elseif ($id == 'pendamping_' . $nim) {
            // dd('pendamping');
            $wisuda = Wisuda::find($nim);
            $wisuda->pendamping = 'ya';
            $wisuda->save();
            Alert::success('Pendamping Mahasiswa Hadir', $wisuda->nim . ' - ' . ucwords($wisuda->nama_lengkap));
            return redirect()->route('scan.index')->with('status', 'Mahasiswa Hadir.');
        } else {
            Alert::warning('Maaf Data Tidak Terdaftar!!!');
            return redirect()->route('scan.index');
        }
    }
}
