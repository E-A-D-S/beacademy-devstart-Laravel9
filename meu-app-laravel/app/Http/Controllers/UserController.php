<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Usercontroller extends Controller
{
   public function index() 
   {
        $users = [
            'nomes'=> [
            'Eduardo santos',
            'Daiane sena'
            ]
        ];

        dd($users);
   }

   public function show($id)
   {

    dd('Id do usuario é ' . $id);

   }
}

