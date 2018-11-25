<table class="table table-responsive"="asetRusaks-table">
    <thead>
        <tr>
            <th>Nomor Surat</th>
        <th>Data Aset</th>
        <th>Users</th>
        <th>Tanggal Kejadian</th>
        <th>Waktu Kejadian</th>
        <th>Lokasi Kejadian</th>
        <th>Kronologis Kejadian</th>
        <th>Langkah Perbaikan</th>
        <th>Catatan Perbaikan</th>
        <th>Rekomendasi</th>
        <th>Mengetahui1</th>
        <th>Jabatan Mengetahui1</th>
        <th>Mengetahui2</th>
        <th>Jabatan Mengetahui2</th>
        <th>Check</th>
        <th>Jabatan Check</th>
        <th>Raised By</th>
        <th>Jabatan Raised By</th>
            {{--<th colspan="3">Action</th>--}}
        </tr>
    </thead>
    <tbody>
    @foreach($asetRusaks as $asetRusak)
        <tr>
            <td>{!! $asetRusak->nomor_surat !!}</td>
            <td>{!! $asetRusak->dataAset->grub_asets->nama !!}</td>
            <td>{!! $asetRusak->user->name !!}</td>
            <td>{!! $asetRusak->tanggal_kejadian !!}</td>
            <td>{!! $asetRusak->waktu_kejadian !!}</td>
            <td>{!! $asetRusak->lokasi_kejadian !!}</td>
            <td>{!! $asetRusak->kronologis_kejadian !!}</td>
            <td>{!! $asetRusak->langkah_perbaikan !!}</td>
            <td>{!! $asetRusak->catatan_perbaikan !!}</td>
            <td>{!! $asetRusak->rekomendasi !!}</td>
            <td>{!! $asetRusak->mengetahui1 !!}</td>
            <td>{!! $asetRusak->jabatan_mengetahui1 !!}</td>
            <td>{!! $asetRusak->mengetahui2 !!}</td>
            <td>{!! $asetRusak->jabatan_mengetahui2 !!}</td>
            <td>{!! $asetRusak->check !!}</td>
            <td>{!! $asetRusak->jabatan_check !!}</td>
            <td>{!! $asetRusak->raised_by !!}</td>
            <td>{!! $asetRusak->jabatan_raised_by !!}</td>
            {{--<td>
                {!! Form::open(['route' => ['asetRusaks.destroy', $asetRusak->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('asetRusaks.show', [$asetRusak->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('asetRusaks.edit', [$asetRusak->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>--}}
        </tr>
    @endforeach
    </tbody>
</table>