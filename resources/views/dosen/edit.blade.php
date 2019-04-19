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
    <a href="/dosen">Kembali</a><br><br>
    @foreach ($dosne as $p)
        <form action="/dosen/ubahdata" method="POST">
            {{ csrf_field() }}
            <input type="hidden" name="id" value="{{$p->id}}"><br>
            Nama <input type="text" name="namadosen" required value="{{$p->namadosen}}">
            NIDN <input type="text" name="nidn" required value="{{$p->nidn}}">
            Alamat <textarea name="alamat" required id="" cols="30" rows="10">{{$p->alamat}}</textarea>
        </form>
    @endforeach
</body>
</html>
