<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class UserController extends Controller
{
    function showUser(){
        $users = [
            [
                'id' => 1,
                'name' => 'Chiến'
            ],
            [
                'id' => 2,
                'name' => 'Long'
            ]
            ];
       return view('list-user')->with([
        'users' => $users
       ]);
    }

    function getUser($id, $name = ''){
        echo $id;
        echo $name;
    }

    function updateUser(Request $request){
        echo $request->id;
    }
}
