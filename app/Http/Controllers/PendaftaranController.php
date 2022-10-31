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
        //
    }

    public function create()
    {
        return view('pendaftaran._create');
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
            "email" => 'required|unique:users,email',
            "ttl" => 'required',
            "judul_ta" => 'required',
            "ipk" => 'required',
            "jurusan" => 'required|in:teknik informatika, teknik elektro',
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
