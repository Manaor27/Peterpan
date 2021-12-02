<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Pengajuan Perubahan Data</title>
  <link rel="icon" href="https://eclass.ukdw.ac.id/images/favicon.png" type="image/png" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#jenis').on('change', function () {
        var optionSelected = $("option:selected", this);
        var valueSelected = this.value;
        if(valueSelected == 1){
          $('.project').remove();
          $("#data_lama").append('<input type="text" class="form-control project" name="data_lama" id="nim" placeholder="Input Data Lama" value="{{ Auth::user()->mahasiswa->nim }}" readonly>');
          $("#data_baru").append('<input type="text" class="form-control project" placeholder="Input Data Baru" name="data_baru" required>');
        }if(valueSelected == 2){
          $('.project').remove();
          $("#data_lama").append('<input type="text" class="form-control project" name="data_lama" id="nim" placeholder="Input Data Lama" value="{{ Auth::user()->mahasiswa->nama }}" readonly>');
          $("#data_baru").append('<input type="text" class="form-control project" placeholder="Input Data Baru" name="data_baru" required>');
        }if (valueSelected == 3) {
          $('.project').remove();
          $("#data_lama").append('<input type="text" class="form-control project" name="data_lama" id="nim" placeholder="Input Data Lama" value="{{ Auth::user()->mahasiswa->nama_ibu }}" readonly>');
          $("#data_baru").append('<input type="text" class="form-control project" placeholder="Input Data Baru" name="data_baru" required>');
        }if (valueSelected == 4) {
          $('.project').remove();
          $("#data_lama").append('<input type="text" class="form-control project" name="data_lama" id="nim" placeholder="Input Data Lama" value="{{ Auth::user()->mahasiswa->tempat_lahir }}" readonly>');
          $("#data_baru").append('<input type="text" class="form-control project" placeholder="Input Data Baru" name="data_baru" required>');
        }if (valueSelected == 5) {
          $('.project').remove();
          $("#data_lama").append('<input type="text" class="form-control project" name="data_lama" id="nim" placeholder="Input Data Lama" value="{{ Auth::user()->mahasiswa->tgl_lahir }}" readonly>');
          $("#data_baru").append('<input type="date" class="form-control project" placeholder="Input Data Baru" name="data_baru" required>');
        }if (valueSelected == 6) {
          $('.project').remove();
          $("#data_lama").append('<input type="text" class="form-control project" name="data_lama" id="nim" placeholder="Input Data Lama" value="{{ Auth::user()->mahasiswa->periode_daftar }}" readonly>');
          $("#data_baru").append('<input type="text" class="form-control project" placeholder="Input Data Baru" name="data_baru" required>');
        }if (valueSelected == 7) {
          $('.project').remove();
          $("#data_lama").append('<input type="text" class="form-control project" name="data_lama" id="nim" placeholder="Input Data Lama" value="{{ Auth::user()->mahasiswa->jenis_kelamin }}" readonly>');
          $("#data_baru").append('<select name="data_baru" class="form-control project" id="baru3" required><option value="Laki-laki">Laki-laki</option><option value="Perempuan">Perempuan</option></select>');
        }
      });
    });
  </script>
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
