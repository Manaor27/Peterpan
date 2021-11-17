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
                      @foreach($ubah as $u)
                        <a type="button" class="btn btn-block btn-success fa fa-upload" href="{{url('/simpan/berkas/'. $u->id)}}"><b> Upload Berkas </b></a>
                      @endforeach
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
                            <th style="text-align: center">Action</th>
                          </tr>
                        </thead>
                        <tbody>
                        @foreach($ubah as $u)
                          <tr>
                            <td>{{ $u->jenis->jenis_perubahan }}</td>
                            <td>{{ $u->data_lama }}</td>
                            <td>{{ $u->data_baru }}</td>
                            <td>{{ $u->status }}</td>
                            <td style="text-align: center">
                              <a class="btn btn-app bg-aqua" href="{{url('/mahasiswa/edit/'. $u->id)}}">
                                <i class="fa fa-edit"></i> Edit
                              </a>
                              <a class="btn btn-app bg-red" href="{{url('/mahasiswa/delete/'. $u->id)}}">
                                <i class="fa fa-remove"></i> Delete
                              </a>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                      </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <div class="box">
                    <div class="box-header">
                      <h3 class="box-title">Berkas Pendukung</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                      <table class="table table-condensed">
                      @php
                        $no = 1;
                      @endphp
                        <tr>
                          <th style="width: 100px; text-align: center;">#</th>
                          <th style="width: 620px">Jenis Dokumen</th>
                          <th style="text-align: center">Action</th>
                        </tr>
                        @foreach($doc as $d)
                        @if($d->ktm!=null)
                        <tr>
                          <td style="text-align: center">{{ $no++ }}</td>
                          <td>Kartu Tanda Mahasiswa</td>
                          <td style="text-align: center">
                            <a class="btn btn-app bg-aqua" href="{{url('/mahasiswa/tampil/1')}}">
                              <i class="fa fa-eye"></i> Preview
                            </a>
                            <a class="btn btn-app bg-red" href="{{url('/mahasiswa/delete')}}">
                              <i class="fa fa-remove"></i> Delete
                            </a>
                          </td>
                        </tr>
                        @endif
                        @if($d->ijazah!=null)
                        <tr>
                          <td style="text-align: center">{{ $no++ }}</td>
                          <td>Ijazah</td>
                          <td style="text-align: center">
                            <a class="btn btn-app bg-aqua" href="{{url('/mahasiswa/tampil/2')}}">
                              <i class="fa fa-eye"></i> Preview
                            </a>
                            <a class="btn btn-app bg-red" href="{{url('/mahasiswa/delete')}}">
                              <i class="fa fa-remove"></i> Delete
                            </a>
                          </td>
                        </tr>
                        @endif
                        @if($d->transkrip!=null)
                        <tr>
                          <td style="text-align: center">{{ $no++ }}</td>
                          <td>Transkrip Nilai</td>
                          <td style="text-align: center">
                            <a class="btn btn-app bg-aqua" href="{{url('/mahasiswa/tampil/3')}}">
                              <i class="fa fa-eye"></i> Preview
                            </a>
                            <a class="btn btn-app bg-red" href="{{url('/mahasiswa/delete')}}">
                              <i class="fa fa-remove"></i> Delete
                            </a>
                          </td>
                        </tr>
                        @endif
                        @if($d->khs!=null)
                        <tr>
                          <td style="text-align: center">{{ $no++ }}</td>
                          <td>Kartu Hasil Studi</td>
                          <td style="text-align: center">
                            <a class="btn btn-app bg-aqua" href="{{url('/mahasiswa/tampil/4')}}">
                              <i class="fa fa-eye"></i> Preview
                            </a>
                            <a class="btn btn-app bg-red" href="{{url('/mahasiswa/delete')}}">
                              <i class="fa fa-remove"></i> Delete
                            </a>
                          </td>
                        </tr>
                        @endif
                        @if($d->akte!=null)
                        <tr>
                          <td style="text-align: center">{{ $no++ }}</td>
                          <td>Akte Kelahiran</td>
                          <td style="text-align: center">
                            <a class="btn btn-app bg-aqua" href="{{url('/mahasiswa/tampil/5')}}">
                              <i class="fa fa-eye"></i> Preview
                            </a>
                            <a class="btn btn-app bg-red" href="{{url('/mahasiswa/delete')}}">
                              <i class="fa fa-remove"></i> Delete
                            </a>
                          </td>
                        </tr>
                        @endif
                        @if($d->kk!=null)
                        <tr>
                          <td style="text-align: center">{{ $no++ }}</td>
                          <td>Kartu Keluarga</td>
                          <td style="text-align: center">
                            <a class="btn btn-app bg-aqua" href="{{url('/mahasiswa/tampil/6')}}">
                              <i class="fa fa-eye"></i> Preview
                            </a>
                            <a class="btn btn-app bg-red" href="{{url('/mahasiswa/delete')}}">
                              <i class="fa fa-remove"></i> Delete
                            </a>
                          </td>
                        </tr>
                        @endif
                        @if($d->surat!=null)
                        <tr>
                          <td style="text-align: center">{{ $no++ }}</td>
                          <td>Surat Penerimaan</td>
                          <td style="text-align: center">
                            <a class="btn btn-app bg-aqua" href="{{url('/mahasiswa/tampil/7')}}">
                              <i class="fa fa-eye"></i> Preview
                            </a>
                            <a class="btn btn-app bg-red" href="{{url('/mahasiswa/delete')}}">
                              <i class="fa fa-remove"></i> Delete
                            </a>
                          </td>
                        </tr>
                        @endif
                        @endforeach
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
