<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jenis;
use Hash;

class JenisController extends Controller
{
    public function index(){
        $jenis = Jenis::paginate(10);
        return view('admin.jenis', compact('jenis'));
    }

    public function tambah(){
        return view('admin.tambahjenis');
    }

    public function simpan(Request $request) {
        Jenis::create([
            'jenis_perubahan' => $request->jenis
        ]);
        return redirect("/jenis");
    }

    public function edit($id) {
        $jenis = Jenis::find($id);
        return view('admin.editjenis', compact('jenis'));
    }

    public function update($id, Request $request) {
        $jenis = Jenis::find($id);
        $jenis->jenis_perubahan = $request->jenis;
        $user->save();
        return redirect("/jenis");
    }

    public function delete($id) {
        $jenis = Jenis::find($id);
        $jenis->delete();
        return redirect('/jenis');
    }
}
