<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('data_mahasiswa')->insert([
            'nim' => '72190315',
            'nama' => 'Ferry',
            'nama_ibu' => 'Ibu Ferry',
            'perguruan_tinggi' => 'Universitas Kristen Duta Wacana',
            'prodi' => 'Sistem Informasi',
            'status' => 'Aktif',
            'tgl_masuk' => '2019-08-05',
            'periode_daftar' => '2019/2020 Ganjil',
            'tempat_lahir' => 'Sintang',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Dimana-mana hatinya senang',
            'kota' => 'Sintang - Kalimantan Barat',
            'kode_pos' => '77777'
        ]);
        DB::table('data_mahasiswa')->insert([
            'nim' => '72190331',
            'nama' => 'Gabriel Manaor Adi Pratama',
            'nama_ibu' => 'Ibu Gabriel',
            'perguruan_tinggi' => 'Universitas Kristen Duta Wacana',
            'prodi' => 'Sistem Informasi',
            'status' => 'Aktif',
            'tgl_masuk' => '2019-08-05',
            'periode_daftar' => '2019/2020 Ganjil',
            'tempat_lahir' => 'Samarinda',
            'jenis_kelamin' => 'Laki-laki',
            'alamat' => 'Dimana-mana hatinya senang',
            'kota' => 'Samarinda - Kalimantan TImur',
            'kode_pos' => '77771'
        ]);
    }
}
