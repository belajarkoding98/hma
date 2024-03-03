<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{
    public function index()
    {
        //tampilkan semua data pengguna
        $dataUser = User::all();
        return view('pages.user.index', compact('dataUser'));
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'user_email' => 'required|email|unique:users',
            'user_fullname' => 'required',
            'password' => 'required',
            'password_confirm' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = new User([
            'user_email' => $request->user_email,
            'user_fullname' => $request->user_fullname,
            'user_status' => 0,
            'password' => bcrypt($request->password),
        ]);
        $user->save();
        return redirect('/user')->with('success', 'Data Pengguna berhasil ditambahkan!');
    }

    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {
        $dataUpdate = [
            'user_email' => $request->user_email,
            'user_fullname' => $request->user_fullname,
        ];
        if (!empty($request->password)) {
            $dataUpdate['password'] =  bcrypt($request->password);
        }
        $user = User::where('user_id', $id);
        $user->update($dataUpdate);
        return redirect('/user')->with('success', 'Data Pengguna berhasil diupdate!');
    }

    public function detail($id)
    {
        //mengambil data sesuai id
        $dataStatus = user::where('user_id', $id)->first();
        return response()->json($dataStatus);
    }

    public function delete($id)
    {
        User::where('user_id', $id)->delete();
        return response()->json(['status' => 'Data Pengguna berhasil dihapus!']);
    }
}
