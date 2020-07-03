<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index() {
        $rr = Role::get();
        $uu = User::get();
        return view('admin/master/user', ['user' => $uu, 'role' => $rr]);
    }

    public function store(Request $request) {
        // return $request->all();
        DB::table('users')->insert([
            'id_role' => $request->txtRole,
            'username' => $request->txtUsername,
            'password' => bcrypt($request->txtPassword),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('user.index')->with('insert', 'Data Berhasil Ditambah');;
    }

    public function update(Request $request, $id){
        // return $request->all();
        DB::table('users')->where('id_user', $id)->update([
            'id_role' => $request->txtedRole,
            'username' => $request->txtedUsername,
            'password' => bcrypt($request->txtedPassword),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->route('user.index')->with('update', 'Data Berhasil Diubah');;
    }

    public function destroy($id) {
        DB::table('users')->where('id_user', $id)->delete();

        return redirect()->route('user.index')->with('delete', 'Data Berhasil Dihapus');;
    }
}
