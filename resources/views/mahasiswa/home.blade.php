<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="icon" href="https://www.ukdw.ac.id/wp-content/uploads/2017/10/fti-ukdw.png" type="image/png" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ asset('style/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('style/bower_components/font-awesome/css/font-awesome.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{ asset('style/bower_components/Ionicons/css/ionicons.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('style/dist/css/AdminLTE.min.css') }}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="{{ asset('style/dist/css/skins/_all-skins.min.css') }}">
  <!-- Morris chart -->
  <link rel="stylesheet" href="{{ asset('style/bower_components/morris.js/morris.css') }}">
  <!-- jvectormap -->
  <link rel="stylesheet" href="{{ asset('style/bower_components/jvectormap/jquery-jvectormap.css') }}">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="{{ asset('style/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('style/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
          <div class="box">
            <div class="box-header">
            <div class="col-md-12">
              <a type="button" class="btn btn-block btn-success" href="/user/tambah"><b> Ubah Data </b></a>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table border">
                <tr>
                    <td width="200px">NIM</td>
                    <td width="50px"> : </td>
                    <td>{{ $mhs->nim }}</td>
                </tr>
                <tr>
                    <td>Nama</td>
                    <td> : </td>
                    <td>{{ $mhs->nama }}</td>
                </tr>
                <tr>
                    <td>Nama Ibu Kandung</td>
                    <td> : </td>
                    <td>{{ $mhs->nama_ibu }}</td>
                </tr>
                <tr>
                    <td>Perguruan Tinggi</td>
                    <td> : </td>
                    <td>{{ $mhs->perguruan_tinggi }}</td>
                </tr>
                <tr>
                    <td>Program Studi</td>
                    <td> : </td>
                    <td>{{ $mhs->prodi }}</td>
                </tr>
                <tr>
                    <td>Status Mahasiswa</td>
                    <td> : </td>
                    <td>{{ $mhs->status }}</td>
                </tr>
                <tr>
                    <td>Tanggal Masuk</td>
                    <td> : </td>
                    <td>{{ $mhs->tgl_masuk }}</td>
                </tr>
                <tr>
                    <td>Periode Pendaftaran</td>
                    <td> : </td>
                    <td>{{ $mhs->periode_daftar }}</td>
                </tr>
                <tr>
                    <td>Tanggal Lulus</td>
                    <td> : </td>
                    <td>{{ $mhs->tgl_lulus }}</td>
                </tr>
                <tr>
                    <td>IPK</td>
                    <td> : </td>
                    <td>{{ $mhs->ipk }}</td>
                </tr>
                <tr>
                    <td>No. Seri Ijazah</td>
                    <td> : </td>
                    <td>{{ $mhs->no_ijazah }}</td>
                </tr>
                <tr>
                    <td>Tempat Lahir</td>
                    <td> : </td>
                    <td>{{ $mhs->tempat_lahir }}</td>
                </tr>
                <tr>
                    <td>Tanggal lahir</td>
                    <td> : </td>
                    <td>{{ $mhs->tgl_lahir }}</td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td>
                    <td> : </td>
                    <td>{{ $mhs->jenis_kelamin }}</td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td> : </td>
                    <td>{{ $mhs->alamat }}</td>
                </tr>
                <tr>
                    <td>Kota Tempat Tinggal</td>
                    <td> : </td>
                    <td>{{ $mhs->kota }}</td>
                </tr>
                <tr>
                    <td>Kode Pos</td>
                    <td> : </td>
                    <td>{{ $mhs->kode_pos }}</td>
                </tr>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
@endsection
</body>
</html>