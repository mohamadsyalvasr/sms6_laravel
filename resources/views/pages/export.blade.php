<table>
    <thead>
        <tr>
            <th>No</th>
            <th>NIM</th>
            <th>Nama</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
    @php $no = 1 @endphp
    @foreach($users as $user)
        <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $user->nim }}</td>
            <td>{{ $user->namamahasiswa }}</td>
            <td>{{ $user->alamat }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
