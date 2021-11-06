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
            'jenis_perubahan' => 'Nomor Induk Mahasiswa'
        ]);
        DB::table('jenis')->insert([
            'jenis_perubahan' => 'Nama Mahasiswa'
        ]);
        DB::table('jenis')->insert([
            'jenis_perubahan' => 'Nama Ibu Kandung'
        ]);
        DB::table('jenis')->insert([
            'jenis_perubahan' => 'Tempat Lahir'
        ]);
        DB::table('jenis')->insert([
            'jenis_perubahan' => 'Tanggal Lahir'
        ]);
        DB::table('jenis')->insert([
            'jenis_perubahan' => 'Periode Pendaftaran'
        ]);
        DB::table('jenis')->insert([
            'jenis_perubahan' => 'Jenis Kelamin'
        ]);
    }
}
