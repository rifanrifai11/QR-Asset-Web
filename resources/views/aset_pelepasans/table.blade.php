<table class="table table-responsive"="asetPelepasans-table">
    <thead>
        <tr>
            <th>Nomor Surat</th>
        <th>Data Aset</th>
        <th>Users</th>
        <th>Metode Pelepasan</th>
        <th>Catatan</th>
        <th>Foto Saat Ini</th>
        <th>Menyetujui</th>
        <th>Jabatan Menyetujui</th>
        <th>Mengetahui</th>
        <th>Jabatan Mengetahui</th>
        <th>Diajukan</th>
        <th>Jabatan Diajukan</th>
           {{-- <th colspan="3">Action</th>--}}
        </tr>
    </thead>
    <tbody>
    @foreach($asetPelepasans as $asetPelepasan)
        <tr>
            <td>{!! $asetPelepasan->nomor_surat !!}</td>
            <td>{!! $asetPelepasan->dataAset->grub_asets->nama !!}</td>
            <td>{!! $asetPelepasan->user->name !!}</td>
            <td>{!! $asetPelepasan->metode_pelepasan !!}</td>
            <td>{!! $asetPelepasan->catatan !!}</td>
            <td>{!! $asetPelepasan->foto_saat_ini !!}</td>
            <td>{!! $asetPelepasan->menyetujui !!}</td>
            <td>{!! $asetPelepasan->jabatan_menyetujui !!}</td>
            <td>{!! $asetPelepasan->mengetahui !!}</td>
            <td>{!! $asetPelepasan->jabatan_mengetahui !!}</td>
            <td>{!! $asetPelepasan->diajukan !!}</td>
            <td>{!! $asetPelepasan->jabatan_diajukan !!}</td>
            {{--<td>
                {!! Form::open(['route' => ['asetPelepasans.destroy', $asetPelepasan->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('asetPelepasans.show', [$asetPelepasan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('asetPelepasans.edit', [$asetPelepasan->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>--}}
        </tr>
    @endforeach
    </tbody>
</table>