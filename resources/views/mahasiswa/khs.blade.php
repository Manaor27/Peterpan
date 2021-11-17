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
    @foreach($doc as $d)
    <div class="text-center">
        <embed type="application/pdf" src="{{asset('khs/'.$d->khs)}}" width="700" height="600"></embed>
    </div>
    @endforeach
    </section>
    <!-- /.content -->
  </div>
  @endsection
</body>
</html>
