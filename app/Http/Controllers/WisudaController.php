<?php

namespace App\Http\Controllers;

use App\Models\Wisuda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class WisudaController extends Controller
{
    public function index()
    {
        if (Auth::user()->level == 'mahasiswa') {
            $mhs = Auth::user();
            $year = $mhs->wisuda->tahun;
            $wisuda = Wisuda::where('tahun', $year)->where('status', 'diterima')->get();
            return view('wisuda.index', compact('wisuda', 'year'));
        } else {
            $year = date('Y');
            $wisuda = Wisuda::where('tahun', $year)->where('status', 'diterima')->get();
            return view('wisuda.index', compact('wisuda', 'year'));
        }
    }

    public function indexAll()
    {
        $wisuda = Wisuda::all();
        return view('wisuda.indexall', compact('wisuda'));
    }

    public function create()
    {
        return view('wisuda.create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            "nim" => 'required|unique:wisuda,nim',
            "nama_lengkap" => 'required',
            "ttl" => 'required',
            "judul_ta" => 'required',
            "ipk" => 'required',
            "jurusan" => 'required|in:teknik informatika, teknik elektro',
        ]);
        if ($validate) {
            Wisuda::create([
                'nim' => htmlspecialchars(strtolower($request->nim)),
                'nama_lengkap' => htmlspecialchars(strtolower($request->nama_lengkap)),
                'ttl' => htmlspecialchars(strtolower($request->ttl)),
                'judul_ta' => htmlspecialchars(strtolower($request->judul_ta)),
                'ipk' => htmlspecialchars(strtolower($request->ipk)),
                'jurusan' => htmlspecialchars(strtolower($request->jurusan)),
                'tahun' => date('Y'),
            ]);
            return redirect()->route('wisuda.index')->with('status', 'Data berhasil ditambahkan.');
        }
    }

    public function show($id)
    {
        $wisuda = Wisuda::findOrFail($id);
        return view('wisuda.show', compact('wisuda'));
    }

    public function edit($id)
    {
        $wisuda = Wisuda::findOrFail($id);
        return view('wisuda.edit', compact('wisuda'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            "nim" => 'required',
            "nama_lengkap" => 'required',
            "ttl" => 'required',
            "judul_ta" => 'required',
            "ipk" => 'required',
            "jurusan" => 'required|in:teknik informatika,teknik elektro',
            "kehadiran" => 'required|in:ya,tidak',
            "orangtua" => 'required|in:ya,tidak',
            "pendamping" => 'required|in:ya,tidak',
        ]);
        if ($validate) {
            Wisuda::findOrFail($id)->update([
                'nim' => htmlspecialchars(strtolower($request->nim)),
                'nama_lengkap' => htmlspecialchars(strtolower($request->nama_lengkap)),
                'ttl' => htmlspecialchars(strtolower($request->ttl)),
                'judul_ta' => htmlspecialchars(strtolower($request->judul_ta)),
                'ipk' => htmlspecialchars(strtolower($request->ipk)),
                'jurusan' => htmlspecialchars(strtolower($request->jurusan)),
                'kehadiran' => htmlspecialchars(strtolower($request->kehadiran)),
                'orangtua' => htmlspecialchars(strtolower($request->orangtua)),
                'pendamping' => htmlspecialchars(strtolower($request->pendamping)),
                'tahun' => date('Y'),
            ]);
            return redirect()->route('wisuda.index')->with('status', 'Data berhasil dirubah.');
        }
    }

    public function destroy($id)
    {
        $wisuda = Wisuda::findOrFail($id);
        $wisuda->delete();
        return redirect()->route('wisuda.index')->with('status', 'Data berhasil dihapuskan.');
    }

    public function hadir($id)
    {
        $wisuda = Wisuda::find($id);
        $nim = substr($id, -9, null);

        if ($wisuda) {
            $wisuda->kehadiran = 'ya';
            $wisuda->save();
            Alert::success('Mahasiswa Hadir', $wisuda->nim . ' - ' . ucwords($wisuda->nama_lengkap));
            return redirect()->route('wisuda.index')->with('status', 'Mahasiswa Hadir.');
        } elseif ($id == 'orangtua_' . $nim) {
            // dd($nim);
            $wisuda = Wisuda::find($nim);
            $wisuda->orangtua = 'ya';
            $wisuda->save();
            Alert::success('Orang Tua Mahasiswa Hadir', $wisuda->nim . ' - ' . ucwords($wisuda->nama_lengkap));
            return redirect()->route('wisuda.index')->with('status', 'Mahasiswa Hadir.');
        } elseif ($id == 'pendamping_' . $nim) {
            // dd('pendamping');
            $wisuda = Wisuda::find($nim);
            $wisuda->pendamping = 'ya';
            $wisuda->save();
            Alert::success('Pendamping Mahasiswa Hadir', $wisuda->nim . ' - ' . ucwords($wisuda->nama_lengkap));
            return redirect()->route('wisuda.index')->with('status', 'Mahasiswa Hadir.');
        } else {
            Alert::warning('Maaf Data Tidak Terdaftar!!!');
            return redirect()->route('wisuda.index');
        }
    }
}
