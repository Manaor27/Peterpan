<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DocPendukung extends Model
{
    use HasFactory;
    protected $table = "doc_pendukung";
    protected $fillable = ['ktm','ijazah','transkrip','khs','akte','kk','surat','id_perubahan'];

    public function perubahan() {
        return $this->belongsTo(Perubahan::class, 'id_perubahan');
    }
}
