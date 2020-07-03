<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\JenisKecelakaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JenisKecelakaanController extends Controller
{
    public function index() {
        $jk = JenisKecelakaan::get();
        return view('admin/master/jenis', ['jenis' => $jk]);
    }

    public function store(Request $request) {
        // return $request->all();
        DB::table('jenis_kecelakaan')->insert([
            'jenis_kecelakaan' => $request->txtJenisKecelakaan,
            'keterangan' => $request->txtKeterangan,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('jenis.index')->with('insert', 'Data Berhasil Ditambah');;
    }

    public function update(Request $request, $id){
        // return $request->all();
        DB::table('jenis_kecelakaan')->where('id_jenis', $id)->update([
            'jenis_kecelakaan' => $request->txtedJenisKecelakaan,
            'keterangan' => $request->txtedKeterangan,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('jenis.index')->with('update', 'Data Berhasil Diubah');;
    }

    public function destroy($id) {
        DB::table('jenis_kecelakaan')->where('id_jenis', $id)->delete();

        return redirect()->route('jenis.index')->with('delete', 'Data Berhasil Dihapus');;
    }
}
