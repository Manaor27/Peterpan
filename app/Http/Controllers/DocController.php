<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Auth;
use DB;
use App\Models\DocPendukung;

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
}
