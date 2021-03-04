<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Umat Gematen</title>
    <style>
        @font-face {
            font-family: 'Muli';
            font-weight: normal;
            font-style: normal;
            font-variant: normal;
            src: url("fonts/Muli.ttf") format("truetype");
        }
        body {
            font-family: Muli, sans-serif;
        }
    </style>
</head>
<body>
    <center>
        <h2>Evaluasi</h2>
        <h5>Tanggal cetak: {{ date('Y-m-d H:i:s') }}</h5>
    </center>
    <br>
    <table class='table table-bordered' border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Nim </th>
                <th scope="col">Nama</th>
                <th scope="col">Status</th>
                <th scope="col"> IPK </th>
                <th scope="col">Total SKS</th>
            </tr>
        </thead>
        <tbody id="daftarUmatWilayah">
            @foreach($mahasiswa as $mhs)
            <tr>
                <td scope="row">{{ $loop->iteration }}</td>
                <td>{{ $mhs->nim}}</td>
                <td>{{ $mhs->nama}}</td>
                <td>{{ $mhs->status}}</td>
                <td>{{ $mhs->ipk}}</td>
                <td>{{ $mhs->total_sks}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>