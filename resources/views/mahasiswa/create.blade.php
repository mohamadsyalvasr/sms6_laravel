<form action="{{ URL('mahasiswa/simpan')}}" method="POST">
    {{ csrf_field() }}
    <fieldset>
        NIM <input type="text" required name="nim"><br>
        Nama Mahasiswa <input type="text" required name="namamahasiswa"><br>
        Alamat <input type="text" required name="alamat"><br>
        Jenis Kelamin <input type="text" required name="kelamin"><br>
        No. Telepon <input type="text" required name="nomortelepon"><br>
        <input type="submit" value="simpan">
    </fieldset>
</form>

