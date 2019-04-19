<a href="{{URL('mahasiswa/form')}}" class="btn btn-raised btn-primary pull-right"> Tambah </a>
<table class="table table-bordered table-hover" border="1">
    <thead>
        <tr>
            <th>#</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Aksi</th>
            <th>Diubah</th>
        </tr>
    </thead>
    <tbody>
        @php (
            $no = 1
        )
        @foreach ($mahasiswa as $mhs)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $mhs->nim }}</td>
            <td>{{ $mhs->namamahasiswa }} </td>
            <td><a href="{{ URL('mahasiswa/show')}}/{{$mhs->id}}">Lihat</a> | Ubah | Hapus</td>
        </tr>

        @endforeach

    </tbody>
</table>
