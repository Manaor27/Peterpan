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
                          </tr>
                        </thead>
                        @foreach($doc as $dc)
                        @if($dc->perubahan->user->id==Auth::user()->id && $dc->perubahan->status=='disetujui')
                        <tbody>
                          <tr>
                            <td>{{ $dc->perubahan->jenis->jenis_perubahan }}</td>
                            <td>{{ $dc->perubahan->data_lama }}</td>
                            <td>{{ $dc->perubahan->data_baru }}</td>
                          </tr>
                        </tbody>
                        @endif
                        @endforeach
                      </table>
                    </div>
                    <!-- /.box-body -->
                  </div>
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
