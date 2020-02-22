<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Santri;

class login extends Controller
{
    public function masuk(Request $request){
        $data1 = Santri::where('email','=', $request->email);
    }

    public function keluar(){

    }
}
