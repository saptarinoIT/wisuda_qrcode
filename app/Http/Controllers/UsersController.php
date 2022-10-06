<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
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
            "name" => 'required',
            "email" => 'required|email|unique:users,email',
            "password" => 'required',
            "level" => 'required|in:admin,petugas',
        ]);
        if ($validate) {
            User::create([
                'name' => htmlspecialchars(strtolower($request->name)),
                'email' => htmlspecialchars(strtolower($request->email)),
                'password' => Hash::make($request->password),
                'level' => htmlspecialchars(strtolower($request->level)),
            ]);
            return redirect()->route('users.index')->with('status', 'Data berhasil ditambahkan.');
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
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
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
            "name" => 'required',
            "email" => 'required|email',
            "password" => 'required',
            "level" => 'required|in:admin,petugas',
        ]);
        if ($validate) {
            $user = User::findOrFail($id);
            $user->name = htmlspecialchars(strtolower($request->name));
            $user->email = htmlspecialchars(strtolower($request->email));
            $user->password = Hash::make($request->password);
            $user->level = htmlspecialchars(strtolower($request->level));
            $user->save();
            return redirect()->route('users.index')->with('status', 'Data berhasil dirubah.');
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
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('status', 'Data berhasil dihapuskan.');
    }
}
