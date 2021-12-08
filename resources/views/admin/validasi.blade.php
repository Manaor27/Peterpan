<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validasi</title>
    <link rel="icon" href="https://eclass.ukdw.ac.id/images/favicon.png" type="image/png" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        $('#status').on('change',function(){
          var optionSelected = $("option:selected",this);
          var valueSelected = this.value;
          if(valueSelected == "ditolak"){
            $('.remove').remove();
            $("#body").append('<div class="form-group remove"><label>Keterangan</label><input class="form-control" type="text" name="keterangan" placeholder="Input Keterangan Ditolak"></div>')
          }else{
            $('.remove').remove();
          }
        });
      });
    </script>
</head>
<body>
    @extends('layouts.app')
    @section('content')
    <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Validasi
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Validasi</li>
      </ol>
    </section>
    
    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="box box-primary">
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="POST" action="/validasi/{{ $valid->id }}">
                @csrf
                @method('put')
                <input type="hidden" class="form-control" name="id" value="{{ $valid->id }}">
              <div class="box-body" id="body">
                <div class="form-group">
                  <label>Nama Pemohon</label>
                  <input type="text" class="form-control" value="{{ $valid->user->mahasiswa->nama }}" readonly>
                </div>
                <div class="form-group">
                  <label>Jenis Perubahan</label></br>
                  <input type="text" class="form-control" value="{{ $valid->jenis->jenis_perubahan }}" readonly>
                </div>
                <div class="form-group">
                  <label>Validasi</label></br>
                  <select name="status" class="form-control select2" style="width: 100%;" id="status" required>
                        <option value="on process">on process</option>
                        <option value="disetujui">disetujui</option>
                        <option value="ditolak">ditolak</option>
                    </select>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Kirim</button>
              </div>
            </form>
    </section>
    <!-- /.content -->
  </div>
@endsection
</body>
</html>