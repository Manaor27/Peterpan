<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\DocPendukung;
use App\Models\Perubahan;
use App\Models\Mahasiswa;
use DB;

class AdminController extends Controller
{
    public function index() {
        $setuju = DB::table('doc_pendukung')->join('perubahan','id_perubahan','=','perubahan.id')->where('perubahan.status','disetujui')->count();
        $proses = DB::table('doc_pendukung')->join('perubahan','id_perubahan','=','perubahan.id')->where('perubahan.status','!=','disetujui')->count();
        return view('admin.home', compact('setuju','proses'));
    }

    public function dataSetuju() {
        $data = DocPendukung::all();
        return view('admin.dsetuju', compact('data'));
    }

    public function dataAjuan() {
        $data = DocPendukung::all();
        return view('admin.dajuan', compact('data'));
    }

    public function laporan() {
        $data = DocPendukung::all();
        return view('admin.laporan', compact('data'));
    }

    public function preview($id) {
        $data = DocPendukung::find($id);
        return view('admin.preview', compact('data'));
    }

    public function validasi($id) {
        $valid = Perubahan::find($id);
        return view('admin.validasi', compact('valid'));
    }

    public function tampil($id,$id2) {
        $doc = DB::table('doc_pendukung')->join('perubahan','id_perubahan','=','perubahan.id')->where('perubahan.id_user',$id2)->get();
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

    public function simpanValidasi($id, Request $request) {
        $valid = Perubahan::find($id);
        $valid->status = $request->status;
        if ($request->status=='ditolak') {
            $valid->keterangan = $request->keterangan;
        }
        $valid->save();
        if ($request->status=='disetujui') {
            if ($valid->jenis->id==1) {
                $mhs = Mahasiswa::find($valid->user->id_mhs);
                $mhs->nim = $valid->data_baru;
                $mhs->save();
                return redirect('/home');
            }elseif ($valid->jenis->id==2) {
                $mhs = Mahasiswa::find($valid->user->id_mhs);
                $mhs->nama = $valid->data_baru;
                $mhs->save();
                return redirect('/home');
            }elseif ($valid->jenis->id==3) {
                $mhs = Mahasiswa::find($valid->user->id_mhs);
                $mhs->nama_ibu = $valid->data_baru;
                $mhs->save();
                return redirect('/home');
            }elseif ($valid->jenis->id==4) {
                $mhs = Mahasiswa::find($valid->user->id_mhs);
                $mhs->tempat_lahir = $valid->data_baru;
                $mhs->save();
                return redirect('/home');
            }elseif ($valid->jenis->id==5) {
                $mhs = Mahasiswa::find($valid->user->id_mhs);
                $mhs->tgl_lahir = $valid->data_baru;
                $mhs->save();
                return redirect('/home');
            }elseif ($valid->jenis->id==6) {
                $mhs = Mahasiswa::find($valid->user->id_mhs);
                $mhs->periode_daftar = $valid->data_baru;
                $mhs->save();
                return redirect('/home');
            }else {
                $mhs = Mahasiswa::find($valid->user->id_mhs);
                $mhs->jenis_kelamin = $valid->data_baru;
                $mhs->save();
                return redirect('/home');
            }
        }else {
            return redirect('/home');
        }
    }
}
