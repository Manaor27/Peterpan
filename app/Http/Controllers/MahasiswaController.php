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
            'status' => null,
            'keterangan' => null
        ]);
        $pr = DB::table('perubahan')->join('jenis','id_jenis','=','jenis.id')->select(DB::raw('perubahan.id_jenis as id, jenis.jenis_perubahan as jenis_perubahan, perubahan.id as perid'))->orderBy('id','asc')->limit('1')->get();
        foreach ($pr as $p) {
            return view('ubah', compact('p'));
        }
    }

    public function simpanData($id, Request $request) {
        $pr = Perubahan::find($id);
        $pr->data_lama = $request->data_lama;
        $pr->data_baru = $request->data_baru;
        $pr->save();
        DocPendukung::create([
            'id_perubahan' => $id
        ]);
        return redirect('/upload');
    }

    public function uploadBerkas() {
        $doc = DB::table('doc_pendukung')->join('perubahan','id_perubahan','=','perubahan.id')->join('jenis','id_jenis','=','jenis.id')->select(DB::raw('jenis.jenis_perubahan as jenis_perubahan, perubahan.data_lama as data_lama, perubahan.data_baru as data_baru, perubahan.status as status, perubahan.keterangan as keterangan, doc_pendukung.ktm as ktm, doc_pendukung.khs as khs, doc_pendukung.ijazah as ijazah, doc_pendukung.transkrip as transkrip, doc_pendukung.akte as akte, doc_pendukung.kk as kk, doc_pendukung.surat as surat, perubahan.id as perubahanid, doc_pendukung.id as id'))->where('perubahan.id_user',Auth::user()->id)->where('perubahan.status',null)->orWhere('perubahan.status','on process')->orWhere('perubahan.status','ditolak')->get();
        $data = DB::table('doc_pendukung')->join('perubahan','id_perubahan','=','perubahan.id')->select(DB::raw('perubahan.status as status, doc_pendukung.id as id, perubahan.id as perid'))->orderBy('id','desc')->limit('1')->get();
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

    public function save(Request $request, $id) {
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
        $doc = DocPendukung::find($id);
        $doc->ktm = $ktmName;
        $doc->ijazah = $ijazahName;
        $doc->transkrip = $transkripName;
        $doc->khs = $khsName;
        $doc->akte = $akteName;
        $doc->kk = $kkName;
        $doc->surat = $suratName;
        $doc->save();
        return redirect('/upload');
    }

    public function edit($id) {
        $u = DocPendukung::find($id);
        return view('ubahfile', compact('u'));
    }

    public function update(Request $request, $id) {
        $ktm = $request->file('ktm');
        $oldktm = $request->file('oldktm');
        if ($ktm==null) {
            $ktmName = $oldktm->getClientOriginalName();
            $oldktm->move('ktm/', $ktmName);
        }else {
            $ktmName = 'ktm_'.Auth::user()->mahasiswa->nim. $ktm->getClientOriginalName();
            File::delete($oldktm);
            $ktm->move('ktm/', $ktmName);
        }
        $ijazah = $request->file('ijazah');
        $oldijazah = $request->file('oldijazah');
        if ($ijazah==null) {
            $ijazahName = $oldijazah->getClientOriginalName();
            $oldijazah->move('ijazah/', $ijazahName);
        }else {
            $ijazahName = 'ijazah_'. Auth::user()->mahasiswa->nim. $ijazah->getClientOriginalName();
            File::delete($oldijazah);
            $ijazah->move('ijazah/', $ijazahName);
        }
        $transkrip = $request->file('transkrip');
        $oldtranskrip = $request->file('oldtranskrip');
        if ($transkrip==null) {
            $transkripName = $oldtranskrip->getClientOriginalName();
            $oldtranskrip->move('transkrip/', $transkripName);
        }else {
            $transkripName = 'transkrip_'. Auth::user()->mahasiswa->nim. $transkrip->getClientOriginalName();
            File::delete($oldtranskrip);
            $transkrip->move('transkrip/', $transkripName);
        }
        $khs = $request->file('khs');
        $oldkhs = $request->file('oldkhs');
        if ($khs==null) {
            $khsName = $oldkhs->getClientOriginalName();
            $oldkhs->move('khs/', $khsName);
        }else {
            $khsName = 'khs_'. Auth::user()->mahasiswa->nim. $khs->getClientOriginalName();
            File::delete($oldkhs);
            $khs->move('khs/', $khsName);
        }
        $akte = $request->file('akte');
        $oldakte = $request->file('oldakte');
        if ($akte==null) {
            $akteName = $oldakte->getClientOriginalName();
            $oldakte->move('akte/', $akteName);
        }else {
            $akteName = 'akte_'. Auth::user()->mahasiswa->nim. $akte->getClientOriginalName();
            File::delete($oldakte);
            $akte->move('akte/', $akteName);
        }
        $kk = $request->file('kk');
        $oldkk = $request->file('kk');
        if ($kk==null) {
            $kkName = $oldkk->getClientOriginalName();
            $oldkk->move('kk/', $kkName);
        }else {
            $kkName = 'kk_'. Auth::user()->mahasiswa->nim. $kk->getClientOriginalName();
            File::delete($oldkk);
            $kk->move('kk/', $kkName);
        }
        $surat = $request->file('surat');
        $oldsurat = $request->file('oldsurat');
        if ($surat==null) {
            $suratName = $oldsurat->getClientOriginalName();
            $oldsurat->move('surat/', $suratName);
        }else {
            $suratName = 'surat_'. Auth::user()->mahasiswa->nim. $surat->getClientOriginalName();
            File::delete($oldsurat);
            $surat->move('surat/', $suratName);
        }
        $doc = DocPendukung::find($id);
        $doc->ktm = $ktmName;
        $doc->ijazah = $ijazahName;
        $doc->transkrip = $transkripName;
        $doc->khs = $khsName;
        $doc->akte = $akteName;
        $doc->kk = $kkName;
        $doc->surat = $suratName;
        $doc->save();
        return redirect('/upload');
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
