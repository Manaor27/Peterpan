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
  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Pengajuan Perubahan Data
      </h1>
      <ol class="breadcrumb">
        <li><a href="/home"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Form Perubahan Data</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#update" data-toggle="tab">Data Yang Ingin di Update</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="update">
                <section id="new">
                <form role="form" method="POST" action="/simpan/perubahan">
                @csrf
              <div class="box-body">
              <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                <div class="form-group">
                  <label>Jenis Perubahan</label>
                  <select name="jenis" class="form-control" id="jenis">
                  @foreach($jns as $j)
                    <option value="{{ $j->id }}">
                        {{ $j->jenis_perubahan }}
                    </option>
                  @endforeach
                  </select>
                </div>
                <div class="form-group" id="data_lama">
                  <label>Data Lama</label>
                  <input type="text" class="form-control project" name="data_lama" placeholder="Input Data Lama" value="{{ Auth::user()->mahasiswa->nim }}" readonly>
                </div>
                <div class="form-group" id="data_baru">
                  <label>Data Baru</label>
                  <input type="text" class="form-control project" placeholder="Input Data Baru" name="data_baru" id="baru1" required>
                </div-->
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
                </section>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  @endsection
</body>
</html>
