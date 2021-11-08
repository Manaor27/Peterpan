<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pengajuan Perubahan Data</title>
  <link rel="icon" href="https://eclass.ukdw.ac.id/images/favicon.png" type="image/png" />
</head>
<body>
    @extends('layouts.app')
    @section('content')
<div class="wrapper">

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengajuan Perubahan Data
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Form Perubahan Data</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#update" data-toggle="tab">Data Yang Ingin di Update</a></li>
            </ul>
            <div class="tab-content">
              <!-- Font Awesome Icons -->
              <div class="tab-pane active" id="update">
                <section id="new">
                    <div class="box">
                        <div class="box-header">
                            <div class="col-md-4">
                                <a type="button" class="btn btn-block btn-success fa fa-upload" href="{{url('/simpan/berkas/'. $u->id)}}"><b> Upload Berkas </b></a>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <table class="table border" >
                                <thead>
                                    <tr>
                                        <th>Jenis Perubahan</th>
                                        <th>Data Lama</th>
                                        <th>Data Baru</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $u->jenis->jenis_perubahan }}</td>
                                        <td>{{ $u->data_lama }}</td>
                                        <td>{{ $u->data_baru }}</td>
                                        <td>{{ $u->status }}</td>
                                        <td>
                                            <a class="btn btn-app bg-aqua" href="{{url('/mahasiswa/edit/'. $u->id)}}">
                                                <i class="fa fa-edit"></i> Edit
                                            </a>
                                            <a class="btn btn-app bg-red" href="{{url('/mahasiswa/delete/'. $u->id)}}">
                                                <i class="fa fa-remove"></i> Delete
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.box-body -->
                    </div>
                </section>
              </div>
              <!-- /#ion-icons -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  @endsection
</body>
</html>
