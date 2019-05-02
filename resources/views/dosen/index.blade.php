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
    <form action="/dosen/satu" method="GET">
		<input type="text" name="cari" placeholder="Cari nidn .." value="{{ old('cari') }}">
		<input type="submit" value="CARI">
	</form>
    <a href="/dosen/tambah">+ Tambah Dosen Baru</a>
    <br><br>
    <table border="1">
        <tr>
            <th>Foto</th>
            <th>Nama</th>
            <th>NIDN</th>
            <th>Alamat</th>
            <th>Opsi</th>
        </tr>
        @if ($dosen!=null)
            @foreach ($dosen as $p)
                <tr>
                    <td><img src="{{ asset('storage/images/'.$p->nama_foto)}}" alt="" height="42" width="42"></td>
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

    {{-- Jumlah Data : {{ $dosen->total() }} --}}
</body>
</html>
