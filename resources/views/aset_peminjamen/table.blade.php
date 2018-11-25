<table class="table table-striped table-bordered file-export">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Nomor Surat</th>
        <th>Data Aset Id</th>
        <th>Users Id</th>
        <th>Nomor Peminjam</th>
        <th>Nama Peminjam</th>
        <th>Nrp</th>
        <th>Departemen Id</th>
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
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($asetPeminjamen as $asetPeminjaman)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $asetPeminjaman->nomor_surat !!}</td>
            <td>{!! $asetPeminjaman->data_aset_id !!}</td>
            <td>{!! $asetPeminjaman->users_id !!}</td>
            <td>{!! $asetPeminjaman->nomor_peminjam !!}</td>
            <td>{!! $asetPeminjaman->nama_peminjam !!}</td>
            <td>{!! $asetPeminjaman->nrp !!}</td>
            <td>{!! $asetPeminjaman->departemen_id !!}</td>
            <td>{!! $asetPeminjaman->jabatan !!}</td>
            <td>{!! $asetPeminjaman->alasan !!}</td>
            <td>{!! $asetPeminjaman->tanggal_peminjaman !!}</td>
            <td>{!! $asetPeminjaman->waktu_peminjaman_awal !!}</td>
            <td>{!! $asetPeminjaman->waktu_peminjaman_akhir !!}</td>
            <td>{!! $asetPeminjaman->tanggal_pengembalian !!}</td>
            <td>{!! $asetPeminjaman->waktu_pengembalian !!}</td>
            <td>{!! $asetPeminjaman->jabatan_peminjam !!}</td>
            <td>{!! $asetPeminjaman->mengetahui !!}</td>
            <td>{!! $asetPeminjaman->jabatan_mengetahui !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['asetPeminjamen.destroy', $asetPeminjaman->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('asetPeminjamen.show', [$asetPeminjaman->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('asetPeminjamen.edit', [$asetPeminjaman->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
