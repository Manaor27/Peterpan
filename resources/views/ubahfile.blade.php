
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
        <li class="active">Upload Berkas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li><a href="#up" data-toggle="tab">Data Yang Ingin di Update</a></li>
              <li class="active"><a href="#berkas" data-toggle="tab">Input Berkas</a></li>
            </ul>
            <div class="tab-content">
              <!-- Font Awesome Icons -->
              <div class="tab-pane" id="up">
              <form role="form" action="/update/{{$u->id}}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="box-body">
                <div class="form-group">
                  <label>Jenis Perubahan</label>
                  <select name="jenis" class="form-control">
                    <option value="{{ $u->perubahan->jenis->id }}">
                        {{ $u->perubahan->jenis->jenis_perubahan }}
                    </option>
                    @foreach($jns as $j)
                    <option value="{{ $j->id }}">
                        {{ $j->jenis_perubahan }}
                    </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label>Data Lama</label>
                  <input type="text" class="form-control" name="data_lama" value="{{ $u->perubahan->data_lama }}" readonly>
                </div>
                <div class="form-group">
                  <label>Data Baru</label>
                  <input type="text" class="form-control" name="data_baru" value="{{ $u->perubahan->data_baru }}">
                </div>
              </div>
              </div>
              <!-- /#fa-icons -->

              <!-- glyphicons-->
              <div class="tab-pane active" id="berkas">
              <section id="new">
              <div class="box box-info">
                <div class="box-header with-border">
                  <h3 class="box-title">Horizontal Form</h3>
                </div>
                
                  <div class="box-body">
                  @if($u->perubahan->id_jenis!=6 && $u->perubahan->id_jenis!=7)
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Kartu Tanda Mahasiswa</label>
                      <div class="col-sm-9">
                        <input type="file" name="ktm">
                        <input type="hidden" name="oldktm" value="{{$u->ktm}}">
                        <p class="help-block">Pastikan file anda ( jpg,jpeg,png,doc,docx,pdf ) !!!</p>
                      </div>
                    </div>
                    @if(Auth::user()->mahasiswa->no_ijazah!=null)
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Ijazah</label>
                      <div class="col-sm-9">
                        <input type="file" name="ijazah">
                        <input type="hidden" name="oldijazah" value="{{$u->ijazah}}">
                        <p class="help-block">Pastikan file anda ( jpg,jpeg,png,doc,docx,pdf ) !!!</p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Transkrip Nilai</label>
                      <div class="col-sm-9">
                        <input type="file" name="transkrip">
                        <input type="hidden" name="oldtranskrip" value="{{$u->transkrip}}">
                        <p class="help-block">Pastikan file anda ( jpg,jpeg,png,doc,docx,pdf ) !!!</p>
                      </div>
                    </div>
                    @endif
                  @endif
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Kartu Hasil Studi</label>
                      <div class="col-sm-9">
                        <input type="file" name="khs">
                        <input type="hidden" name="oldkhs" value="{{$u->khs}}">
                        <p class="help-block">Pastikan file anda ( jpg,jpeg,png,doc,docx,pdf ) !!!</p>
                      </div>
                    </div>
                  @if($u->perubahan->id_jenis!=1 && $u->perubahan->id_jenis!=6 && $u->id_jenis!=7)
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Akte Kelahiran</label>
                      <div class="col-sm-9">
                        <input type="file" name="akte">
                        <input type="hidden" name="oldakte" value="{{$u->akte}}">
                        <p class="help-block">Pastikan file anda ( jpg,jpeg,png,doc,docx,pdf ) !!!</p>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Kartu Keluarga</label>
                      <div class="col-sm-9">
                        <input type="file" name="kk">
                        <input type="hidden" name="oldkk" value="{{$u->kk}}">
                        <p class="help-block">Pastikan file anda ( jpg,jpeg,png,doc,docx,pdf ) !!!</p>
                      </div>
                    </div>
                  @endif
                  @if($u->perubahan->id_jenis==6)
                    <div class="form-group">
                      <label class="col-sm-3 control-label">Surat Penerimaan</label>
                      <div class="col-sm-9">
                        <input type="file" name="surat">
                        <input type="hidden" name="oldsurat" value="{{$u->surat}}">
                        <p class="help-block">Pastikan file anda ( jpg,jpeg,png,doc,docx,pdf ) !!!</p>
                      </div>
                    </div>
                  @endif
                    <div class="col-sm-3"></div>
                    <div class="box-footer col-sm-9" required>
                      <button type="submit" class="btn btn-success fa fa-upload"> Upload</button>
                    </div>
                  </div>
                  <!-- /.box-body -->
                </form>
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
