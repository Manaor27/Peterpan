<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Auth;
use DB;
use App\Models\DocPendukung;
use App\Models\Perubahan;
use App\Models\Jenis;

class DocController extends Controller
{
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
        $jns = Jenis::all();
        return view('ubahfile', compact('u','jns'));
    }

    public function update(Request $request, $id) {
        $ktm = $request->file('ktm');
        $oldktm = $request->oldktm;
        if ($ktm==null) {
            $ktmName = $oldktm;
        }else {
            $ktmName = 'ktm_'.Auth::user()->mahasiswa->nim. $ktm->getClientOriginalName();
            File::delete($oldktm);
            $ktm->move('ktm/', $ktmName);
        }
        $ijazah = $request->file('ijazah');
        $oldijazah = $request->oldijazah;
        if ($ijazah==null) {
            $ijazahName = $oldijazah;
        }else {
            $ijazahName = 'ijazah_'. Auth::user()->mahasiswa->nim. $ijazah->getClientOriginalName();
            File::delete($oldijazah);
            $ijazah->move('ijazah/', $ijazahName);
        }
        $transkrip = $request->file('transkrip');
        $oldtranskrip = $request->oldtranskrip;
        if ($transkrip==null) {
            $transkripName = $oldtranskrip;
        }else {
            $transkripName = 'transkrip_'. Auth::user()->mahasiswa->nim. $transkrip->getClientOriginalName();
            File::delete($oldtranskrip);
            $transkrip->move('transkrip/', $transkripName);
        }
        $khs = $request->file('khs');
        $oldkhs = $request->oldkhs;
        if ($khs==null) {
            $khsName = $oldkhs;
        }else {
            $khsName = 'khs_'. Auth::user()->mahasiswa->nim. $khs->getClientOriginalName();
            File::delete($oldkhs);
            $khs->move('khs/', $khsName);
        }
        $akte = $request->file('akte');
        $oldakte = $request->oldakte;
        if ($akte==null) {
            $akteName = $oldakte;
        }else {
            $akteName = 'akte_'. Auth::user()->mahasiswa->nim. $akte->getClientOriginalName();
            File::delete($oldakte);
            $akte->move('akte/', $akteName);
        }
        $kk = $request->file('kk');
        $oldkk = $request->kk;
        if ($kk==null) {
            $kkName = $oldkk;
        }else {
            $kkName = 'kk_'. Auth::user()->mahasiswa->nim. $kk->getClientOriginalName();
            File::delete($oldkk);
            $kk->move('kk/', $kkName);
        }
        $surat = $request->file('surat');
        $oldsurat = $request->oldsurat;
        if ($surat==null) {
            $suratName = $oldsurat;
        }else {
            $suratName = 'surat_'. Auth::user()->mahasiswa->nim. $surat->getClientOriginalName();
            File::delete($oldsurat);
            $surat->move('surat/', $suratName);
        }
        $doc = DocPendukung::find($id);
        $per = Perubahan::find($id);
        $doc->ktm = $ktmName;
        $doc->ijazah = $ijazahName;
        $doc->transkrip = $transkripName;
        $doc->khs = $khsName;
        $doc->akte = $akteName;
        $doc->kk = $kkName;
        $doc->surat = $suratName;
        $per->id_jenis = $request->jenis;
        $per->data_baru = $request->data_baru;
        $per->save();
        $doc->save();
        return redirect('/upload');
    }
}
