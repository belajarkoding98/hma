<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //semua data pengguna
        $dataAllUser = User::all();

        //data pengguna aktif
        $dataUserActive = User::where('user_status', '1');
        return view('pages.admin.index', compact('dataAllUser', 'dataUserActive'));
    }

    public function logout(Request $request)
    {
        User::where('user_id', Auth()->id())->update(['user_status' => 0]);
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
