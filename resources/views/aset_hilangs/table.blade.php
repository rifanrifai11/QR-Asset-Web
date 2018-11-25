<table class="table table-responsive"="asetHilangs-table">
    <thead>
        <tr>
            <th>Nomor Surat</th>
        <th>Data Aset</th>
        <th>Users</th>
        <th>Tanggal Kejadian</th>
        <th>Waktu Kejadian</th>
        <th>Lokasi Kejadian</th>
        <th>Kronologis Kejadian</th>
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
    @foreach($asetHilangs as $asetHilang)
        <tr>
            <td>{!! $asetHilang->nomor_surat !!}</td>
            <td>{!! $asetHilang->dataAset->grub_asets->nama !!}</td>
            <td>{!! $asetHilang->user->name !!}</td>
            <td>{!! \Carbon\Carbon::parse( $asetHilang->tanggal_kejadian)->format('d-m-Y') !!}</td>
            <td>{!! $asetHilang->waktu_kejadian !!}</td>
            <td>{!! $asetHilang->lokasi_kejadian !!}</td>
            <td>{!! $asetHilang->kronologis_kejadian !!}</td>
            <td>{!! $asetHilang->mengetahui1 !!}</td>
            <td>{!! $asetHilang->jabatan_mengetahui1 !!}</td>
            <td>{!! $asetHilang->mengetahui2 !!}</td>
            <td>{!! $asetHilang->jabatan_mengetahui2 !!}</td>
            <td>{!! $asetHilang->check !!}</td>
            <td>{!! $asetHilang->jabatan_check !!}</td>
            <td>{!! $asetHilang->raised_by !!}</td>
            <td>{!! $asetHilang->jabatan_raised_by !!}</td>
            {{--<td>
                {!! Form::open(['route' => ['asetHilangs.destroy', $asetHilang->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('asetHilangs.show', [$asetHilang->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('asetHilangs.edit', [$asetHilang->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>--}}
        </tr>
    @endforeach
    </tbody>
</table>