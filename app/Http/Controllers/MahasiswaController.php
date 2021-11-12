<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Models\Mahasiswa;
use App\Models\Jenis;
use App\Models\Perubahan;
use App\Models\DocPendukung;

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
            'data_baru' => $request->data_baru,
            'status' => 'on process'
        ]);
        return redirect('/upload');
    }

    public function uploadBerkas() {
        $ubah = DB::table('perubahan')->where('id_user',Auth::user()->id)->orderBy('id','desc')->limit('1')->get();
        foreach ($ubah as $ub) {
            $u = Perubahan::find($ub->id);
            return view('data', compact('u'));
        }
    }

    public function simpanBerkas(Request $request,$id) {
        $u = Perubahan::find($id);
        return view('ubahdt', compact('u'));
    }

    public function save(Request $request) {
        /*$request->validate([
            'ktm' => 'required|mimes:jpg,jpeg,png,doc,docx,pdf',
            'ijazah' => 'required|mimes:jpg,jpeg,png,doc,docx,pdf',
            'transkrip' => 'required|mimes:jpg,jpeg,png,doc,docx,pdf',
            'khs' => 'required|mimes:jpg,jpeg,png,doc,docx,pdf',
            'akte' => 'required|mimes:jpg,jpeg,png,doc,docx,pdf',
            'kk' => 'required|mimes:jpg,jpeg,png,doc,docx,pdf',
            'surat' => 'required|mimes:jpg,jpeg,png,doc,docx,pdf',
        ]);*/
        $ktm = $request->file('ktm');
        if ($ktm==null) {
            $ktmName = null;
        }else {
            $ktmName = 'ktm_'.Auth::user()->mahasiswa->nim. $ktm->getClientOriginalName();
            $ktm->move('ktm/', $ktmName);
        }
        $ijazah = $request->file('ijazah');
        if ($ijazah==null) {
            $ijazahName = null;
        }else {
            $ijazahName = 'ijazah_'. Auth::user()->mahasiswa->nim. $ijazah->getClientOriginalName();
            $ijazah->move('ijazah/', $ijazahName);
        }
        $transkrip = $request->file('transkrip');
        if ($transkrip==null) {
            $transkripName = null;
        }else {
            $transkripName = 'transkrip_'. Auth::user()->mahasiswa->nim. $transkrip->getClientOriginalName();
            $transkrip->move('transkrip/', $transkripName);
        }
        $khs = $request->file('khs');
        if ($khs==null) {
            $khsName = null;
        }else {
            $khsName = 'khs_'. Auth::user()->mahasiswa->nim. $khs->getClientOriginalName();
            $khs->move('khs/', $khsName);
        }
        $akte = $request->file('akte');
        if ($akte==null) {
            $akteName = null;
        }else {
            $akteName = 'akte_'. Auth::user()->mahasiswa->nim. $akte->getClientOriginalName();
            $akte->move('akte/', $akteName);
        }
        $kk = $request->file('kk');
        if ($kk==null) {
            $kkName = null;
        }else {
            $kkName = 'kk_'. Auth::user()->mahasiswa->nim. $kk->getClientOriginalName();
            $kk->move('kk/', $kkName);
        }
        $surat = $request->file('surat');
        if ($surat==null) {
            $suratName = null;
        }else {
            $suratName = 'surat_'. Auth::user()->mahasiswa->nim. $surat->getClientOriginalName();
            $surat->move('surat/', $suratName);
        }
        DocPendukung::create([
            'ktm' => $ktmName,
            'ijazah' => $ijazahName,
            'transkrip' => $transkripName,
            'khs' => $khsName,
            'akte' => $akteName,
            'kk' => $kkName,
            'surat' => $suratName,
            'id_perubahan' => $request->id
        ]);
        return redirect('/home');
    }
}
