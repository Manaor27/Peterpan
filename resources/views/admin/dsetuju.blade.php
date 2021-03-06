<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Disetujui</title>
    <link rel="icon" href="https://eclass.ukdw.ac.id/images/favicon.png" type="image/png" />
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
        Data Disetujui
        <small>Control panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Dashborad</a></li>
        <li class="active">Data Disetujui</li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <a href="/download" type="button" class="btn btn-block btn-warning" target="_Blank">Cetak Laporan</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>#</th>
                  <th>Jenis Perubahan</th>
                  <th>Nama Pemohon</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                @php
                    $no = 1;
                @endphp
                <tbody>
                @foreach($data as $item)
                @if($item->perubahan->status=='disetujui')
                <tr>
                  <td>{{ $no++ }}</td>
                  <td>{{ $item->perubahan->jenis->jenis_perubahan }}</td>
                  <td>{{ $item->perubahan->user->mahasiswa->nama }}</td>
                  @if($item->perubahan->status=='on process')
                  <td><span class="label bg-yellow">{{ $item->perubahan->status }}</span></td>
                  @elseif($item->perubahan->status=='disetujui')
                  <td><span class="label bg-green">{{ $item->perubahan->status }}</span></td>
                  @else
                  <td><span class="label bg-red">{{ $item->perubahan->status }}</span></td>
                  @endif
                  <td>
                    <a href="{{url('/admin/preview/'. $item->id)}}" class="btn btn-app bg-green">
                      <i class="fa fa-eye"></i> Preview
                    </a>
                  </td>
                </tr>
                @endif
                @endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- Modal Profile -->
      <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h3 class="modal-title">Show Data</h3>
                </div>
                <div class="modal-body">
                    <h4 id="mediumBody">
                        <!-- the result to be displayed apply here -->
                    </h4>
                </div>
            </div>
        </div>
    </div>
      <!-- /.row (main row) -->
    </section>
    <!-- /.content -->
  </div>
@endsection
</body>
</html>