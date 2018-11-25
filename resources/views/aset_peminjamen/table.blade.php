<table class="table table-responsive"="asetPeminjamen-table">
    <thead>
        <tr>
            <th>Nomor Surat</th>
        <th>Data Aset</th>
        <th>Users</th>
        <th>Nomor Peminjam</th>
        <th>Nama Peminjam</th>
        <th>Nrp</th>
        <th>Departemen</th>
        <th>Jabatan</th>
        <th>Alasan</th>
        <th>Tanggal Peminjaman</th>
        <th>Waktu Peminjaman Awal</th>
        <th>Waktu Peminjaman Akhir</th>
        <th>Tanggal Pengembalian</th>
        <th>Waktu Pengembalian</th>
        <th>Jabatan Peminjam</th>
        <th>Mengetahui</th>
        <th>Jabatan Mengetahui</th>
           {{-- <th colspan="3">Action</th>--}}
        </tr>
    </thead>
    <tbody>
    @foreach($asetPeminjamen as $asetPeminjaman)
        <tr>
            <td>{!! $asetPeminjaman->nomor_surat !!}</td>
            <td>{!! $asetPeminjaman->dataAset->grub_asets->nama !!}</td>
            <td>{!! $asetPeminjaman->user->name !!}</td>
            <td>{!! $asetPeminjaman->nomor_peminjam !!}</td>
            <td>{!! $asetPeminjaman->nama_peminjam !!}</td>
            <td>{!! $asetPeminjaman->nrp !!}</td>
            <td>{!! $asetPeminjaman->departemen_id !!}</td>
            <td>{!! $asetPeminjaman->jabatan !!}</td>
            <td>{!! $asetPeminjaman->alasan !!}</td>
            <td>{!! \Carbon\Carbon::parse($asetPeminjaman->tanggal_peminjaman)->format('d-m-Y') !!}</td>
            <td>{!! $asetPeminjaman->waktu_peminjaman_awal !!}</td>
            <td>{!! $asetPeminjaman->waktu_peminjaman_akhir !!}</td>
            <td>{!! \Carbon\Carbon::parse($asetPeminjaman->tanggal_pengembalian)->format('d-m-Y') !!}</td>
            <td>{!! $asetPeminjaman->waktu_pengembalian !!}</td>
            <td>{!! $asetPeminjaman->jabatan_peminjam !!}</td>
            <td>{!! $asetPeminjaman->mengetahui !!}</td>
            <td>{!! $asetPeminjaman->jabatan_mengetahui !!}</td>
            {{--<td>
                {!! Form::open(['route' => ['asetPeminjamen.destroy', $asetPeminjaman->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('asetPeminjamen.show', [$asetPeminjaman->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('asetPeminjamen.edit', [$asetPeminjaman->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>--}}
        </tr>
    @endforeach
    </tbody>
</table>