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
                <form role="form" method="POST" action="/simpan/data/{{$p->perid}}" name="form1" id="form1">
                @csrf
                @method('put')
              <div class="box-body">
                <div class="form-group">
                  <label>Jenis Perubahan</label>
                  <select name="jenis" class="form-control" id="jenis">
                    <option value="{{ $p->id }}">
                      {{ $p->jenis_perubahan }}
                    </option>
                  </select>
                </div>
                @if($p->id==1)
                <div class="form-group">
                  <label>Data Lama</label>
                  <input type="text" class="form-control" name="data_lama" value="{{ Auth::user()->mahasiswa->nim }}" readonly>
                </div>
                <div class="form-group">
                  <label>Data Baru</label>
                  <input type="text" class="form-control" placeholder="Input Data Baru" name="data_baru" required>
                </div>
                @elseif($p->id==2)
                <div class="form-group">
                  <label>Data Lama</label>
                  <input type="text" class="form-control" name="data_lama" value="{{ Auth::user()->mahasiswa->nama }}" readonly>
                </div>
                <div class="form-group">
                  <label>Data Baru</label>
                  <input type="text" class="form-control" placeholder="Input Data Baru" name="data_baru" required>
                </div>
                @elseif($p->id==3)
                <div class="form-group">
                  <label>Data Lama</label>
                  <input type="text" class="form-control" name="data_lama" value="{{ Auth::user()->mahasiswa->nama_ibu }}" readonly>
                </div>
                <div class="form-group">
                  <label>Data Baru</label>
                  <input type="text" class="form-control" placeholder="Input Data Baru" name="data_baru" required>
                </div>
                @elseif($p->id==4)
                <div class="form-group">
                  <label>Data Lama</label>
                  <input type="text" class="form-control" name="data_lama" value="{{ Auth::user()->mahasiswa->tempat_lahir }}" readonly>
                </div>
                <div class="form-group">
                  <label>Data Baru</label>
                  <input type="text" class="form-control" placeholder="Input Data Baru" name="data_baru" required>
                </div>
                @elseif($p->id==5)
                <div class="form-group">
                  <label>Data Lama</label>
                  <input type="text" class="form-control" name="data_lama" value="{{ Auth::user()->mahasiswa->tgl_lahir }}" readonly>
                </div>
                <div class="form-group">
                  <label>Data Baru</label>
                  <input type="date" class="form-control" placeholder="Input Data Baru" name="data_baru" required>
                </div>
                @elseif($p->id==6)
                <div class="form-group">
                  <label>Data Lama</label>
                  <input type="text" class="form-control" name="data_lama" value="{{ Auth::user()->mahasiswa->periode_daftar }}" readonly>
                </div>
                <div class="form-group">
                  <label>Data Baru</label>
                  <input type="text" class="form-control" placeholder="Input Data Baru" name="data_baru" required>
                  Contoh input: 2019/2020 Ganjil, 2019/2020 Genap
                </div>
                @else
                <div class="form-group">
                  <label>Data Lama</label>
                  <input type="text" class="form-control" name="data_lama" value="{{ Auth::user()->mahasiswa->jenis_kelamin }}" readonly>
                </div>
                <div class="form-group">
                  <label>Data Baru</label>
                  <select name="data_baru" class="form-control">
                    <option value="Laki-laki">Laki-laki</option>
                    <option value="Perempuan">Perempuan</option>
                  </select>
                </div>
                @endif
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
              </div>
            </form>
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
