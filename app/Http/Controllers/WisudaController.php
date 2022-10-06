<?php

namespace App\Http\Controllers;

use App\Models\Wisuda;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class WisudaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wisuda = Wisuda::all();
        return view('wisuda.index', compact('wisuda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('wisuda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            "nim" => 'required|unique:wisuda,nim',
            "nama_lengkap" => 'required',
            "ttl" => 'required',
            "jenis_kelamin" => 'required|in:laki-laki,perempuan',
            "judul_ta" => 'required',
            "ipk" => 'required',
            "jurusan" => 'required|in:teknik informatika, teknik elektro',
        ]);
        if ($validate) {
            Wisuda::create([
                'nim' => htmlspecialchars(strtolower($request->nim)),
                'nama_lengkap' => htmlspecialchars(strtolower($request->nama_lengkap)),
                'ttl' => htmlspecialchars(strtolower($request->ttl)),
                'jenis_kelamin' => htmlspecialchars($request->jenis_kelamin),
                'judul_ta' => htmlspecialchars(strtolower($request->judul_ta)),
                'ipk' => htmlspecialchars(strtolower($request->ipk)),
                'jurusan' => htmlspecialchars(strtolower($request->jurusan)),
            ]);
            return redirect()->route('wisuda.index')->with('status', 'Data berhasil ditambahkan.');
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
        $wisuda = Wisuda::findOrFail($id);
        return view('wisuda.show', compact('wisuda'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $wisuda = Wisuda::findOrFail($id);
        return view('wisuda.edit', compact('wisuda'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            "nim" => 'required',
            "nama_lengkap" => 'required',
            "ttl" => 'required',
            "jenis_kelamin" => 'required|in:laki-laki,perempuan',
            "judul_ta" => 'required',
            "ipk" => 'required',
            "jurusan" => 'required|in:teknik informatika,teknik elektro',
            "kehadiran" => 'required|in:ya,tidak',
        ]);
        if ($validate) {
            Wisuda::findOrFail($id)->update([
                'nim' => htmlspecialchars(strtolower($request->nim)),
                'nama_lengkap' => htmlspecialchars(strtolower($request->nama_lengkap)),
                'ttl' => htmlspecialchars(strtolower($request->ttl)),
                'jenis_kelamin' => htmlspecialchars($request->jenis_kelamin),
                'judul_ta' => htmlspecialchars(strtolower($request->judul_ta)),
                'ipk' => htmlspecialchars(strtolower($request->ipk)),
                'jurusan' => htmlspecialchars(strtolower($request->jurusan)),
                'kehadiran' => htmlspecialchars(strtolower($request->kehadiran)),
            ]);
            return redirect()->route('wisuda.index')->with('status', 'Data berhasil dirubah.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $wisuda = Wisuda::findOrFail($id);
        $wisuda->delete();
        return redirect()->route('wisuda.index')->with('status', 'Data berhasil dihapuskan.');
    }

    public function hadir($id)
    {
        $wisuda = Wisuda::findOrFail($id);
        $wisuda->kehadiran = 'ya';
        $wisuda->save();
        Alert::success('Mahasiswa Hadir', $wisuda->nim . ' - ' . ucwords($wisuda->nama_lengkap));
        return redirect()->route('wisuda.index')->with('status', 'Mahasiswa Hadir.');
    }
}
