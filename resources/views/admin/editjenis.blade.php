<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ubah Jenis Perubahan</title>
    <link rel="icon" href="https://www.ukdw.ac.id/wp-content/uploads/2017/10/fti-ukdw.png" type="image/png" />
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
</head>
<body>
  @extends('layouts.app')
  @section('content')
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Manajemen Jenis Perubahan
      </h1>
      <ol class="breadcrumb">
        <li><a href="/"><i class="fa fa-group"></i> Beranda</a></li>
        <li>Manajemen Jenis Perubahan</li>
        <li class="active">Ubah Jenis Perubahan</li>
      </ol>
    </section>
    <section class="content">
      <div class="box box-primary">
        <form role="form" method="POST" action="/jenis/update/{{ $jenis->id }}">
          @csrf
          @method('PUT')
          <div class="box-body">
            <div class="form-group">
              <label>Jenis Perubahan</label>
              <input type="text" class="form-control" name="jenis" placeholder="Input Jenis Perubahan" value="{{ $jenis->jenis_perubahan }}">
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" class="btn btn-primary">Kirim</button>
          </div>
        </form>
      </div>
    </section>
  </div>
@endsection
</body>
</html>