<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('jenis')->insert([
            'jenis_perubahan' => 'Nomor Induk Mahasiswa',
            'doc_pendukung' => 'Kartu Tanda Mahasiswa,Ijazah dan Traskrip,Kartu Hasil Studi'
        ]);
        DB::table('jenis')->insert([
            'jenis_perubahan' => 'Nama Mahasiswa',
            'doc_pendukung' => 'Akte Kelahiran,Kartu Keluarga,Kartu Tanda Mahasiswa,Ijazah dan Transkrip'
        ]);
        DB::table('jenis')->insert([
            'jenis_perubahan' => 'Nama Ibu Kandung',
            'doc_pendukung' => 'Akte Kelahiran,Kartu Keluarga'
        ]);
        DB::table('jenis')->insert([
            'jenis_perubahan' => 'Tempat Lahir',
            'doc_pendukung' => 'Akte Kelahiran,Kartu Keluarga,Kartu Tanda Mahasiswa,Ijazah dan Transkrip'
        ]);
        DB::table('jenis')->insert([
            'jenis_perubahan' => 'Tanggal Lahir',
            'doc_pendukung' => 'Akte Kelahiran,Kartu Keluarga,Kartu Tanda Mahasiswa,Ijazah dan Transkrip'
        ]);
        DB::table('jenis')->insert([
            'jenis_perubahan' => 'Periode Pendaftaran',
            'doc_pendukung' => 'Surat Penerimaan Mahasiswa'
        ]);
        DB::table('jenis')->insert([
            'jenis_perubahan' => 'Jenis Kelamin',
            'doc_pendukung' => 'Mengikuti Persyaratan Umum'
        ]);
    }
}
