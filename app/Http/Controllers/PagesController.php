<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\KamarSantris;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function home() {
        
        return view('admin/dashboard');
    }
    public function santri() {
        return view('admin/index');
    }

    public function kamar(){
        $kamar = Kamar::get();
        $space = KamarSantris::groupBy('id_kamar')->count();
        return view('admin/kamar/index', ['kamar' => $kamar], ['space' => $space]);
    }

}
