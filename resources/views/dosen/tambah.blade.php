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
    <form action="/dosen/simpan" method="POST">
        {{ csrf_field() }}
        Nama <input type="text" name="namadosen" required><br>
        NIDN <input type="text" name="nidn" required><br>
        Alamat <textarea name="alamat" id="" cols="30" rows="10"></textarea>
        <input type="submit" value="Simpan Data">
    </form>
</body>
</html>
