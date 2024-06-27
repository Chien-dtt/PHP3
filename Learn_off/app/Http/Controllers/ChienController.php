<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class ChienController extends Controller
{
    function profileChien(){
        $chiens = [
            [
                'id' => 1,
                'name' => 'Chiến',
                'age' => 20,
                'address' => 'Hà Nội',
                'phone' => 03372,
                'major' => 'Web Developement'
            ],
            [
                'id' => 2,
                'name' => 'Long',
                'age' => 25,
                'address' => 'Hà Nam',
                'phone' => 999,
                'major' => 'Marketing'
            ]
            ];
            return view('profile')->with([
                'chiens' => $chiens
            ]);
    }
}