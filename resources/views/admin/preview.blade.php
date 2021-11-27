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
                          <tr>
                            <td>{{ $data->perubahan->jenis->jenis_perubahan }}</td>
                            <td>{{ $data->perubahan->data_lama }}</td>
                            <td>{{ $data->perubahan->data_baru }}</td>
                            @if($data->perubahan->status=='disetujui')
                            <td><span class="label bg-green">{{ $data->perubahan->status }}</span></td>
                            @elseif($data->perubahan->status=='on process')
                            <td><span class="label bg-yellow">{{ $data->perubahan->status }}</span></td>
                            @else
                            <td><span class="label bg-red">{{ $data->perubahan->status }}</span></td>
                            @endif
                            <td style="text-align: center">
                            @if($data->perubahan->status!=null && $data->perubahan->status!='disetujui')
                              <a class="btn btn-app bg-aqua" href="{{url('/admin/validasi/'. $data->perubahan->id)}}">
                                <i class="fa fa-edit"></i> Validasi
                              </a>
                            @endif
                              <!--@if($data->perubahan->status=="disetujui")
                              <a class="btn btn-app bg-red" href="{{url('/admin/ubah/'. $data->perubahan->id)}}">
                                <i class="fa fa-pencil"></i> Edit
                              @endif-->
                              </a>
                            </td>
                          </tr>
                          @if($data->perubahan->keterangan!=null)
                          <tr>
                            <th>Keterangan</th>
                            <td colspan="3" class="text-danger">{{ $data->perubahan->keterangan }}</td>
                          </tr>
                          @endif
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
                        @if($data->ktm!=null)
                        <tr>
                          <td style="text-align: center">{{ $no++ }}</td>
                          <td>Kartu Tanda Mahasiswa</td>
                          <td style="text-align: center">
                            <a class="btn btn-app bg-green" href="{{url('/admin/tampil/1/'.$data->perubahan->id_user)}}">
                              <i class="fa fa-eye"></i> Preview
                            </a>
                            <!--a class="btn btn-app bg-red" href="{{url('/mahasiswa/delete')}}">
                              <i class="fa fa-remove"></i> Delete
                            </a-->
                          </td>
                        </tr>
                        @endif
                        @if($data->ijazah!=null)
                        <tr>
                          <td style="text-align: center">{{ $no++ }}</td>
                          <td>Ijazah</td>
                          <td style="text-align: center">
                            <a class="btn btn-app bg-green" href="{{url('/admin/tampil/2/'.$data->perubahan->id_user)}}">
                              <i class="fa fa-eye"></i> Preview
                            </a>
                          </td>
                        </tr>
                        @endif
                        @if($data->transkrip!=null)
                        <tr>
                          <td style="text-align: center">{{ $no++ }}</td>
                          <td>Transkrip Nilai</td>
                          <td style="text-align: center">
                            <a class="btn btn-app bg-green" href="{{url('/admin/tampil/3/'.$data->perubahan->id_user)}}">
                              <i class="fa fa-eye"></i> Preview
                            </a>
                          </td>
                        </tr>
                        @endif
                        @if($data->khs!=null)
                        <tr>
                          <td style="text-align: center">{{ $no++ }}</td>
                          <td>Kartu Hasil Studi</td>
                          <td style="text-align: center">
                            <a class="btn btn-app bg-green" href="{{url('/admin/tampil/4/'.$data->perubahan->id_user)}}">
                              <i class="fa fa-eye"></i> Preview
                            </a>
                          </td>
                        </tr>
                        @endif
                        @if($data->akte!=null)
                        <tr>
                          <td style="text-align: center">{{ $no++ }}</td>
                          <td>Akte Kelahiran</td>
                          <td style="text-align: center">
                            <a class="btn btn-app bg-green" href="{{url('/admin/tampil/5/'.$data->perubahan->id_user)}}">
                              <i class="fa fa-eye"></i> Preview
                            </a>
                          </td>
                        </tr>
                        @endif
                        @if($data->kk!=null)
                        <tr>
                          <td style="text-align: center">{{ $no++ }}</td>
                          <td>Kartu Keluarga</td>
                          <td style="text-align: center">
                            <a class="btn btn-app bg-green" href="{{url('/admin/tampil/6/'.$data->perubahan->id_user)}}">
                              <i class="fa fa-eye"></i> Preview
                            </a>
                          </td>
                        </tr>
                        @endif
                        @if($data->surat!=null)
                        <tr>
                          <td style="text-align: center">{{ $no++ }}</td>
                          <td>Surat Penerimaan</td>
                          <td style="text-align: center">
                            <a class="btn btn-app bg-green" href="{{url('/admin/tampil/7/'.$data->perubahan->id_user)}}">
                              <i class="fa fa-eye"></i> Preview
                            </a>
                          </td>
                        </tr>
                        @endif
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
