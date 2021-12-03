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
                        @if($dt->status!='on process' && $dt->status!='disetujui')
                        <a type="button" class="btn btn-block btn-success fa fa-upload" href="{{url('/simpan/berkas/'. $dt->id)}}"><b> Upload Berkas </b></a>
                        @endif
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
                            <th style="text-align: center">Status</th>
                            <th style="text-align: center">Action</th>
                          </tr>
                        </thead>
                        @foreach($doc as $dc)
                        <tbody>
                          <tr>
                            <td>{{ $dc->jenis_perubahan }}</td>
                            <td>{{ $dc->data_lama }}</td>
                            <td>{{ $dc->data_baru }}</td>
                            @if($dc->status=='disetujui')
                            <td style="text-align: center"><span class="label bg-green">{{ $dc->status }}</span></td>
                            @elseif($dc->status=='on process')
                            <td style="text-align: center"><span class="label bg-yellow">{{ $dc->status }}</span></td>
                            @elseif($dc->status=='ditolak')
                            <td style="text-align: center"><span class="label bg-red">{{ $dc->status }}</span></td>
                            @else
                              @if($dc->jenid==1 && $dc->ktm!=null)
                              <td style="text-align: center"><span class="label text-red">Harap Tekan Tombol Simpan Untuk Validasi Proses</span></td>
                              @elseif($dc->jenid==2 && $dc->ktm!=null)
                              <td style="text-align: center"><span class="label text-red">Harap Tekan Tombol Simpan Untuk Validasi Proses</span></td>
                              @elseif($dc->jenid==3 && $dc->akte!=null)
                              <td style="text-align: center"><span class="label text-red">Harap Tekan Tombol Simpan Untuk Validasi Proses</span></td>
                              @elseif($dc->jenid==4 && $dc->ktm!=null)
                              <td style="text-align: center"><span class="label text-red">Harap Tekan Tombol Simpan Untuk Validasi Proses</span></td>
                              @elseif($dc->jenid==5 && $dc->ktm!=null)
                              <td style="text-align: center"><span class="label text-red">Harap Tekan Tombol Simpan Untuk Validasi Proses</span></td>
                              @elseif($dc->jenid==6 && $dc->surat!=null)
                              <td style="text-align: center"><span class="label text-red">Harap Tekan Tombol Simpan Untuk Validasi Proses</span></td>
                              @endif
                            @endif
                            <td style="text-align: center">
                            @if($dc->status=='ditolak' || $dc->status==null)
                              <a class="btn btn-app bg-aqua" href="{{url('/mahasiswa/edit/'. $dc->id)}}">
                                <i class="fa fa-edit"></i> Edit
                              </a>
                              <a class="btn btn-app bg-red" href="{{url('/mahasiswa/delete/'. $dc->perubahanid)}}">
                                <i class="fa fa-remove"></i> Delete
                              </a>
                            @else
                              <a class="btn btn-app bg-aqua" href="#" disabled>
                                <i class="fa fa-edit"></i> Edit
                              </a>
                              <a class="btn btn-app bg-red" href="#" disabled>
                                <i class="fa fa-remove"></i> Delete
                              </a>
                            @endif
                            </td>
                          </tr>
                          @if($dc->keterangan!=null)
                          <tr>
                            <th>Keterangan</th>
                            <td colspan="3">{{ $dc->keterangan }}</td>
                          </tr>
                          @endif
                        </tbody>
                        @endforeach
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
                          </td>
                        </tr>
                        @endif
                        @endforeach
                      </table>
                      <form action="/valid/{{$dt->perid}}" method="post">
                      @csrf
                      @method('PUT')
                        <div class="box-footer">
                          <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                      </form>
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
