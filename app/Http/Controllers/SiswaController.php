<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;
use Illuminate\Support\Facades\Auth;
class SiswaController extends Controller
{
    public function dashboard()
    {
        // Get authenticated user's nilai data
        $user = Auth::user();
        if (!$user) {
            return redirect()->route('login');
        }

        $nilai = $user->nilai;
        return view('siswa.dashboard', compact('nilai'));
    }
}