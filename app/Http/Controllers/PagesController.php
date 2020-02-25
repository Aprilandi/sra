<?php

namespace App\Http\Controllers;

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
        return view('admin/kamar/index');
    }

}
