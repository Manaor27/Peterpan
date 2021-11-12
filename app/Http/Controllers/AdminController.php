<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\DocPendukung;

class AdminController extends Controller
{
    public function index() {
        $user = Auth::user();
        $data = DocPendukung::all();
        return view('admin.home', compact('user','data'));
    }
}
