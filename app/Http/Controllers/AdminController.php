<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\DocPendukung;
use App\Models\Perubahan;

class AdminController extends Controller
{
    public function index() {
        $user = Auth::user();
        $data = DocPendukung::all();
        return view('admin.home', compact('user','data'));
    }

    public function preview($id) {
        $data = DocPendukung::find($id);
        return view('admin.preview', compact('data'));
    }

    public function validasi($id) {
        $valid = Perubahan::find($id);
        return view('admin.validasi', compact('valid'));
    }
}
