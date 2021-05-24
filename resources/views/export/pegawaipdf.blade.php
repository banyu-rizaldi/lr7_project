<table id="table" style="border: 1px solid #ddd">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Lengkap</th>
            <th>Jenis Kelamin</th>
            <th>Agama</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pegawai as $no => $data)
        <tr>
            <td>{{ $no+1 }}</td>
            <td>{{ $data->nama_lengkap() }}</td>
            <td>{{ $data->jenis_kelamin }}</td>
            <td>{{ $data->agama }}</td>
            <td>{{ $data->alamat }}</td>
        </tr>
        @endforeach
    </tbody>
</table>
