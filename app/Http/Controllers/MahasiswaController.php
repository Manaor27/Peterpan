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
            'status' => 'on process'
        ]);
        $pr = Perubahan::all();
        foreach ($pr as $p) {
            return view('ubah', compact('p'));
        }
    }

    public function simpanData($id, Request $request) {
        $pr = Perubahan::find($id);
        $pr->data_lama = $request->data_lama;
        $pr->data_baru = $request->data_baru;
        $pr->save();
        return redirect('/upload');
    }

    public function uploadBerkas() {
        $ubah = Perubahan::where('id_user',Auth::user()->id)->get();
        $doc = DocPendukung::all();
        foreach ($ubah as $u) {
            $d = DocPendukung::find($u->id);
            return view('data', compact('u','d','doc'));
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

    public function tampil($id) {
        $doc = DB::table('doc_pendukung')->join('perubahan','id_perubahan','=','perubahan.id')->where('perubahan.id_user',Auth::user()->id)->get();
        if ($id==1) {
            return view('mahasiswa.ktm', compact('doc'));
        }elseif ($id==4) {
            return view('mahasiswa.khs', compact('doc'));
        }elseif ($id==2) {
            return view('mahasiswa.ijazah', compact('doc'));
        }elseif ($id==3) {
            return view('mahasiswa.transkrip', compact('doc'));
        }elseif ($id==5) {
            return view('mahasiswa.akte', compact('doc'));
        }elseif ($id==6) {
            return view('mahasiswa.kk', compact('doc'));
        }else {
            return view('mahasiswa.surat', compact('doc'));
        }
    }
}
