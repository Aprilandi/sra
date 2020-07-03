<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Laporan;
use App\Models\Kepolisian;
use App\Models\RumahSakit;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Query\Builder;

class LaporController extends Controller
{
    public function index()
    {
        // dd($request->all());
        $bb = Laporan::get();
        $jb = Kepolisian::get();
        $lk = RumahSakit::get();
        return view('lapor/index', ['lapor' => $bb, 'polisi' => $jb, 'rumahsakit' => $lk]);
    }

    public function create()
    {
        $jb = Kepolisian::get();
        $lk = RumahSakit::get();
        return view('lapor/form', ['polisi' => $jb, 'rumahsakit' => $lk]);
    }

    public function edit($id)
    {
        $br = Laporan::find($id);
        $jb = Kepolisian::get();
        $lk = RumahSakit::get();
        return view('lapor/form', ['laporan' => $br, 'polisi' => $jb, 'rumahsakit' => $lk]);
    }

    public function store(Request $request)
    {
        // return $request->all();
        if ($request->file('txtFotoBukti')) {
            $uploadedFile = $request->file('txtFotoBukti');
            $extension = '.' . $uploadedFile->getClientOriginalExtension();
            $filename  = $request->txt . "_" . date("dmy-His") . $extension;
            $uploadedFile->move(base_path('public/dokumen/lapor/'), $filename);

            DB::table('laporan')->insert([
                'id_rs' => $request->txtIDRS,
                'id_pl' => $request->txtIDPL,
                'pelapor' => $request->txtPelapor,
                'loc_gps' => $request->txtGPS,
                'status' => $request->txtStatus,
                'foto_bukti' => $filename,
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
        return redirect()->route('lapor.index')->with('insert', 'Data Berhasil Ditambah');;
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        if ($request->file('txtFotoBukti')) {
            $uploadedFile = $request->file('txtFotoBukti');
            $extension = '.' . $uploadedFile->getClientOriginalExtension();
            $filename  = $request->txt . "_" . date("dmy-His") . $extension;
            $uploadedFile->move(base_path('public/dokumen/lapor/'), $filename);

            DB::table('laporan')->where('id_lapor', $id)->update([
                'id_rs' => $request->txtIDRS,
                'id_pl' => $request->txtIDPL,
                'pelapor' => $request->txtLapor,
                'loc_gps' => $request->txtGPS,
                'status' => $request->txtSTS,
                'foto_bukti' => $filename,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        } else {
            DB::table('laporan')->where('id_lapor', $id)->update([
                'id_rs' => $request->txtIDRS,
                'id_pl' => $request->txtIDPL,
                'pelapor' => $request->txtLapor,
                'loc_gps' => $request->txtGPS,
                'status' => $request->txtSTS,
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }

        return redirect()->route('lapor.index')->with('update', 'Data Berhasil Diubah');;
    }

    public function destroy($id)
    {
        DB::table('laporan')->where('id_lapor', $id)->delete();

        return redirect()->route('lapor.index')->with('delete', 'Data Berhasil Dihapus');;
    }
}
