<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Wisuda;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PendaftaranController extends Controller
{
    public function index()
    {
        $pendaftaran = Wisuda::where('status', 'diproses')->get();
        return view('pendaftaran.index', compact('pendaftaran'));
    }

    public function validasi($id)
    {
        $wisuda = Wisuda::findOrFail($id);
        $wisuda->status = 'diterima';
        $wisuda->save();
        toast('Data Pendaftaran Diterima!', 'success');
        return redirect()->route('wisuda.index');
    }

    public function create()
    {
        return view('pendaftaran._create');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            "nim" => 'required|unique:wisuda,nim',
            "nama_lengkap" => 'required',
            "email" => 'required|unique:users,email',
            "ttl" => 'required',
            "judul_ta" => 'required',
            "ipk" => 'required',
            "jurusan" => 'required|in:teknik informatika,teknik elektro',
        ]);
        if ($validate) {
            $user = User::create([
                'name' => $request->nama_lengkap,
                'email' => $request->email,
                'password' => Hash::make('mahasiswa'),
                'level' => 'mahasiswa',
            ]);

            Wisuda::create([
                'nim' => htmlspecialchars(strtolower($request->nim)),
                'user_id' => $user->id,
                'nama_lengkap' => htmlspecialchars(strtolower($request->nama_lengkap)),
                'ttl' => htmlspecialchars(strtolower($request->ttl)),
                'judul_ta' => htmlspecialchars(strtolower($request->judul_ta)),
                'ipk' => htmlspecialchars(strtolower($request->ipk)),
                'jurusan' => htmlspecialchars(strtolower($request->jurusan)),
                'tahun' => date('Y'),
            ]);

            event(new Registered($user));
            Auth::login($user);
            toast('Pendaftaran Berhasil, Silahkan Menunggu Konfirmasi Admin!', 'success');
            return redirect(RouteServiceProvider::HOME);
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
        return view('pendaftaran._edit', compact('wisuda'));
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            "nim" => 'required',
            "nama_lengkap" => 'required',
            "email" => 'required',
            "ttl" => 'required',
            "judul_ta" => 'required',
            "ipk" => 'required',
            "jurusan" => 'required|in:teknik informatika,teknik elektro',
        ]);
        if ($validate) {
            $wisuda = Wisuda::findOrFail($id);
            $user = User::where('id', $wisuda->user_id)->first();
            $user->email = htmlspecialchars(strtolower($request->email));
            $user->save();

            $wisuda->nim = htmlspecialchars(strtolower($request->nim));
            $wisuda->nama_lengkap = htmlspecialchars(strtolower($request->nama_lengkap));
            $wisuda->ttl = htmlspecialchars(strtolower($request->ttl));
            $wisuda->judul_ta = htmlspecialchars(strtolower($request->judul_ta));
            $wisuda->ipk = htmlspecialchars(strtolower($request->ipk));
            $wisuda->jurusan = htmlspecialchars(strtolower($request->jurusan));
            $wisuda->save();

            toast('Data Wisuda Berhasil Dirubah!', 'success');
            return redirect(RouteServiceProvider::HOME);
        }
    }

    public function destroy($id)
    {
        $wisuda = Wisuda::findOrFail($id);
        $user = User::where('id', $wisuda->user_id)->first();
        $user->delete();
        $wisuda->delete();
        toast('Data Pendaftaran Berhasil Dihapuskan!', 'success');
        return redirect()->route('pendaftaran.index');
    }
}
