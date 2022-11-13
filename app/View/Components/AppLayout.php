<?php

namespace App\View\Components;

use App\Models\Wisuda;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\Component;

class AppLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        if (Auth::user()->level == 'mahasiswa') {
            $mhs = Auth::user()->id;
            $wisuda = Wisuda::where('user_id', $mhs)->first();
            return view('layouts.app', compact('wisuda'));
        } else {
            return view('layouts.app');
        }
    }
}
