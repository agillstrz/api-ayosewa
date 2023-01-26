<?php

namespace App\Http\Controllers;

use App\Models\Sewa;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUser (){
        // $user = Sewa::paginate(10);
        // response()->json([
        //     'data'=> $user
        // ]);
        $user = User::latest()->paginate(10);
     
        return response()->json([
            'data' => $user
        ]);

    }
}