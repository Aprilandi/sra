<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    public function index() {
        $st = Status::get();
        return view('admin/master/status', ['status' => $st]);
    }

    public function store(Request $request) {
        // return $request->all();
        DB::table('status')->insert([
            'nama_sts' => $request->txtNamaSTS,
            'keterangan' => $request->txtKeterangan,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('status.index')->with('insert', 'Data Berhasil Ditambah');;
    }

    public function update(Request $request, $id){
        // return $request->all();
        DB::table('status')->where('id_sts', $id)->update([
            'nama_sts' => $request->txtedNamaSTS,
            'keterangan' => $request->txtedKeterangan,
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('status.index')->with('update', 'Data Berhasil Diubah');;
    }

    public function destroy($id) {
        DB::table('status')->where('id_sts', $id)->delete();

        return redirect()->route('status.index')->with('delete', 'Data Berhasil Dihapus');;
    }
}
