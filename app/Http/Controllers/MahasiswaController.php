<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
            'status' => null,
            'keterangan' => null
        ]);
        $pr = DB::table('perubahan')->orderBy('id','desc')->limit('1')->get();
        foreach ($pr as $p) {
            DocPendukung::create([
                'id_perubahan' => $p->id
            ]);
            return redirect('/upload');
        }
    }

    public function delete($id) {
        $per = Perubahan::find($id);
        $per->delete();
        return redirect('/upload');
    }

    public function uploadBerkas() {
        $doc = DB::table('doc_pendukung')->join('perubahan','id_perubahan','=','perubahan.id')->join('jenis','id_jenis','=','jenis.id')->select(DB::raw('jenis.jenis_perubahan as jenis_perubahan, perubahan.data_lama as data_lama, perubahan.data_baru as data_baru, perubahan.status as status, perubahan.keterangan as keterangan, doc_pendukung.ktm as ktm, doc_pendukung.khs as khs, doc_pendukung.ijazah as ijazah, doc_pendukung.transkrip as transkrip, doc_pendukung.akte as akte, doc_pendukung.kk as kk, doc_pendukung.surat as surat, perubahan.id as perubahanid, doc_pendukung.id as id, jenis.id as jenid'))->where('perubahan.id_user',Auth::user()->id)->where('perubahan.status',null)->orWhere('perubahan.status','on process')->orWhere('perubahan.status','ditolak')->get();
        $data = DB::table('doc_pendukung')->join('perubahan','id_perubahan','=','perubahan.id')->join('jenis','id_jenis','=','jenis.id')->select(DB::raw('perubahan.status as status, doc_pendukung.id as id, perubahan.id as perid, jenis.id as jenid, doc_pendukung.ktm as ktm, doc_pendukung.khs as khs, doc_pendukung.ijazah as ijazah, doc_pendukung.transkrip as transkrip, doc_pendukung.akte as akte, doc_pendukung.kk as kk, doc_pendukung.surat as surat'))->orderBy('id','desc')->limit('1')->get();
        foreach ($data as $dt) {
            return view('data', compact('doc','dt'));
        }
    }

    public function valid($id) {
        $vd = Perubahan::find($id);
        $vd->status = 'on process';
        $vd->save();
        return redirect('/upload');
    }

    public function arsip() {
        $doc = DocPendukung::all();
        return view('datas', compact('doc'));
    }

    public function simpanBerkas(Request $request,$id) {
        $u = DocPendukung::find($id);
        return view('ubahdt', compact('u'));
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
