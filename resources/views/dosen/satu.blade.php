<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{$judul}}</title>
</head>
<body>

    <h3>{{$judul}}</h3>
    <a href="/dosen">Kembali</a>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>NIDN</th>
            <th>Alamat</th>
            <th>Opsi</th>
        </tr>
        @if ($dosen!=null)
            @foreach ($dosen as $p)
                <tr>
                    <td>{{$p->namadosen}}</td>
                    <td>{{$p->nidn}}</td>
                    <td>{{$p->alamat}}</td>
                    <td>
                        <a href="/dosen/edit/{{$p->id}}">Edit</a>
                        |
                        <a href="/dosen/hapus/{{$p->id}}">Hapus</a>
                    </td>
                </tr>
            @endforeach
        @else
                <tr>
                    <td colspan="4">Data Kosong</td>
                </tr>
        @endif
    </table>
</body>
</html>
