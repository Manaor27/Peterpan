<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Mahasiswa;
use App\Models\Jenis;
use App\Models\Perubahan;

class MahasiswaController extends Controller
{
    public function index() {
        $user = Auth::user();
        $mhs = Mahasiswa::find(Auth::user()->id_mhs);
        return view('mahasiswa.home', compact('user','mhs'));
    }

    public function ubahData() {
        $jns = Jenis::all();
        return view('ubahdata', compact('jns'));
    }

    public function simpanPerubahan(Request $request) {
        Perubahan::create([
            'id_user' => $request->id_user,
            'id_jenis' => $request->jenis,
            'data_lama' => $request->data_lama,
            'data_baru' => $request->data_baru
        ]);
        $ubah = DB::table('perubahan')->where('id_user',Auth::user()->id)->orderBy('id','desc')->limit('1')->get();
        foreach ($ubah as $ub) {
            $u = Perubahan::find($ub->id);
            return view('ubahdata2', compact('u'));
        }
    }
}
