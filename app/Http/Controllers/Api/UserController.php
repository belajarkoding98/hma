<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;

class UserController extends BaseController
{
    /** get all users */
    public function index()
    {
        $users = User::all();
        return $this->sendResponse($users, 'Menampilkan semua user');
    }


    public function show(Request $request, $id)
    {
        $users = User::where('user_id', $id)->first();
        if (!empty($users)) {

            return $this->sendResponse($users, 'Menampilkan satu data');
        } else {

            return $this->sendError('Unauthorised.', ['error' => 'Unauthorised']);
        }
    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'password_confirmation' => 'required|same:password',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', ['error' =>    $validator->errors()]);
        }

        $input = [
            'user_fullname' => $request->fullname,
            'user_email' => $request->email,
            'user_status' => 0,
        ];
        $input['password'] = bcrypt($request->password);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->plainTextToken;
        $success['user_fullname'] =  $user->user_fullname;
        return $this->sendResponse($success, 'user berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $input = [
            'user_fullname' => $request->fullname,
            'user_email' => $request->email,
        ];
        $input['password'] = bcrypt($request->password);

        $user = user::where('user_id', $id);
        $user->update($input);
        return $this->sendResponse($input, 'User berhasil diupdate');
    }

    public function delete(Request $request, $id)
    {

        $users = User::where('user_id', $id)->delete();
        if (!empty($users)) {

            return $this->sendResponse($users, 'Delete sukses');
        } else {

            return $this->sendError('Error.', ['error' => 'delete gagal']);
        }
    }
}
