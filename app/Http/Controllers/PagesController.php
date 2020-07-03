<?php

namespace App\Http\Controllers;

use App\Models\Kamar;
use App\Models\KamarSantris;
use App\Models\Keuangan\KategoriKeuangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class PagesController extends Controller
{
    public function home() {
        return view('admin/dashboard');
    }
    public function admin() {
        return view('admin/index');
    }
    public function rumahsakit() {
        return view('rumahsakit/index');
    }
    public function kepolisian() {
        return view('kepolisian/index');
    }

    public function kamar(){
        $kamar = Kamar::get();
        $space = KamarSantris::groupBy('id_kamar')->count();
        return view('admin/kamar/index', ['kamar' => $kamar], ['space' => $space]);
    }

}
