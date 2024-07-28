<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function listUsers(){
        $listUser = User::select('id', 'name', 'email', 'role')->get();
        return view('admin.users.list-user')->with([
            'listUser' => $listUser
        ]);
    }

    public function addUsers(Request $req){
        $req->validate([
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required',
            'role' => 'required',
        ]);

        $check = User::where('email', $req->email)->exists();
        if (!$check) {
        $newUser = new User();
        $newUser->name = $req->name;
        $newUser->email = $req->email;
        $newUser->password = Hash::make($req->password);
        $newUser->role = $req->role;
        $newUser->save();
        }else {
            return redirect()->back()->with([
                'message' => 'Email đã tồn tại !!!'
            ]);
        }
        

        return redirect()->back()->with([
            'message' => 'Successfully !!!'
        ]);
    }

    public function deleteUsers(Request $req){
        $req->validate([
            'id' => 'required',
        ]);

        User::where('id', $req->id)->delete();
        return redirect()->back()->with([
            'message' => 'Xóa thành công'
        ]);
    }

    public function detailUsers(Request $req){
        $user = User::where('id', $req->id)->first()->select('id', 'name', 'email', 'role')->first();
        return json_encode($user);
    }

    
    public function editUsers(Request $req){
        $req->validate([
            'idUser' => 'required',
            'name' => 'required',
            'email' => ['required', 'email'],
            'role' => 'required',
        ]);

        $user = User::where('id', $req->idUser);
        if ($user->exists()) {
            $data = [
                'name' => $req->name,
                'email' => $req->email,
                'role' => $req->role,
            ];
            $user->update($data);
        }
        return redirect()->back()->with([
            'message' => 'Chỉnh sửa thành công'
        ]);
    }
}
