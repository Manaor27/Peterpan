<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Jenis;

class Perubahan extends Model
{
    use HasFactory;
    protected $table = "perubahan";
    protected $fillable = ['id_user','id_jenis','data_lama','data_baru','status','keterangan','tanggal'];

    public function jenis() {
      return $this->belongsTo(Jenis::class, 'id_jenis');
    }

    public function user() {
      return $this->belongsTo(User::class, 'id_user');
    }

    public function docpendukung() {
      return $this->hasOne(DocPendukung::class, 'id_perubahan');
    }
}
