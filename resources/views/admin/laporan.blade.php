<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
    <center>
        <h3>Laporan Pengajuan Perubahan Data</h3>
        <br>
        <table border="2">
            <thead>
                <tr style="text-align: center">
                    <th width="250px">Jenis Perubahan</th>
                    <th width="250px">Nama Pemohon</th>
                    <th width="250px">Data Lama</th>
                    <th width="250px">Data Baru</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data as $item)
            @if($item->perubahan->status=='disetujui')
                <tr>
                    <td>{{ $item->perubahan->jenis->jenis_perubahan }}</td>
                    <td>{{ $item->perubahan->user->mahasiswa->nama }}</td>
                    <td>{{ $item->perubahan->data_lama }}</td>
                    <td>{{ $item->perubahan->data_baru }}</td>
                </tr>
            @endif
            @endforeach
            </tbody>
        </table>
    </center>
    <script>
        window.print();
    </script>
</body>
</html>