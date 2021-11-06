<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;
    protected $table = "jenis";
    protected $fillable = ['jenis_perubahan'];

    public function perubahan() {
		return $this->hasOne(Perubahan::class, 'id_jenis');
	}
}
