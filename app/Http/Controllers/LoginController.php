<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    public function index()
    {
        $data['title'] = 'Login';
        return view('pages.login', $data);
    }

    public function login_action(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        if (Auth::attempt(['user_email' => $request->email, 'password' => $request->password])) {
            $request->session()->regenerate();
            //update status user
            Auth::user()->createToken('MyApp')->accessToken;
            User::where('user_email', $request->email)->update(['user_status' => 1]);
            return response()->json(['status' => 200, 'message' => 'Login sukses']);
        } else {
            return response()->json(['status' => 500, 'message' => 'Username dan Password salah!']);
        }
    }
}
