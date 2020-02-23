<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Santri;
use App\Models\User;

class login extends Controller
{
    public function show(){
        return view('auth/login');
    }

    public function masuk(Request $request){
        $data1 = Santri::where('email','=', $request->email)->where('password','=',$request->password)->get();
        $data2 = User::where('email','=', $request->email)->where('password','=',$request->password)->get();

        if(count($data1)>0){
            Auth::guard('santri')->LoginUsingId($data1[0]['id_santri']);
        }elseif(count($data2)>0){
            Auth::guard('user')->LoginUsingId($data1[0]['id']);
        }else{
            return redirect('auth/login')->with(['']);
        }
    }

    public function keluar(){

    }
}
