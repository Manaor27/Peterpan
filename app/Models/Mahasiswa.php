<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = "data_mahasiswa";
    protected $fillable = ['nim','nama','nama_ibu','perguruan_tinggi','prodi','status','tgl_masuk','periode_daftar','tgl_lulus','ipk','no_ijazah','tempat_lahir','tgl_lahir','jenis_kelamin','alamat','kota','kode_pos'];

    public function user() {
		return $this->hasOne(User::class, 'id_mhs');
	}
}
