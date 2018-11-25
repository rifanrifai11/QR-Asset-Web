<table class="table table-responsive"="asetMutasis-table">
    <thead>
        <tr>
            <th>Nomor Surat</th>
        <th>Data Aset</th>
        <th>Users</th>
        <th>Nama Pengguna Baru</th>
        <th>Posisi Pengguna Baru</th>
        <th>Jabatan Pengguna Baru</th>
        <th>Departemen</th>
        <th>Mengetahui</th>
        <th>Jabatan Mengetahui</th>
        <th>Diserahkan</th>
        <th>Jabatan Diserahkan</th>
            {{--<th colspan="3">Action</th>--}}
        </tr>
    </thead>
    <tbody>
    @foreach($asetMutasis as $asetMutasi)
        <tr>
            <td>{!! $asetMutasi->nomor_surat !!}</td>
            <td>{!! $asetMutasi->dataAset->grub_asets->nama !!}</td>
            <td>{!! $asetMutasi->user->name !!}</td>
            <td>{!! $asetMutasi->nama_pengguna_baru !!}</td>
            <td>{!! $asetMutasi->posisi_pengguna_baru !!}</td>
            <td>{!! $asetMutasi->jabatan_pengguna_baru !!}</td>
            <td>{!! $asetMutasi->departemen_id !!}</td>
            <td>{!! $asetMutasi->mengetahui !!}</td>
            <td>{!! $asetMutasi->jabatan_mengetahui !!}</td>
            <td>{!! $asetMutasi->diserahkan !!}</td>
            <td>{!! $asetMutasi->jabatan_diserahkan !!}</td>
            {{--<td>
                {!! Form::open(['route' => ['asetMutasis.destroy', $asetMutasi->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('asetMutasis.show', [$asetMutasi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('asetMutasis.edit', [$asetMutasi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>--}}
        </tr>
    @endforeach
    </tbody>
</table>