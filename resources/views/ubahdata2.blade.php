
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
              <li><a href="#update" data-toggle="tab">Data Yang Ingin di Update</a></li>
              <li class="active"><a href="#berkas" data-toggle="tab">Input Berkas</a></li>
            </ul>
            <div class="tab-content">
              <!-- Font Awesome Icons -->
              <div class="tab-pane" id="update">
                <section id="new">
                <form role="form" method="POST">
              <div class="box-body">
              <input type="hidden" name="id_user" value="{{ $u->id_user }}">
                <div class="form-group">
                  <label>Jenis Perubahan</label>
                  <select name="jenis" class="form-control" disabled>
                    <option value="{{ $u->jenis->jenis_perubahan }}">
                        {{ $u->jenis->jenis_perubahan }}
                    </option>
                  </select>
                </div>
                <div class="form-group">
                  <label>Data Lama</label>
                  <input type="text" class="form-control" name="data_lama" value="{{ $u->data_lama }}" disabled>
                </div>
                <div class="form-group">
                  <label>Data Baru</label>
                  <input type="text" class="form-control" name="data_baru" value="{{ $u->data_baru }}" disabled>
                </div>
              </div>
            </form>
                </section>
              </div>
              <!-- /#fa-icons -->

              <!-- glyphicons-->
              <div class="tab-pane active" id="berkas">
                
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
