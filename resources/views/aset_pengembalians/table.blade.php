<table class="table table-responsive"="asetPengembalians-table">
    <thead>
        <tr>
            <th>Nomor Surat</th>
        <th>Data Aset</th>
        <th>Users</th>
        <th>Nama</th>
        <th>Nik</th>
        <th>Jabatan</th>
        <th>Departemen</th>
        <th>Lokasi</th>
        <th>Atasan Langsung</th>
        <th>Diserahkan</th>
        <th>Jabatan Diserahkan</th>
        <th>Cek</th>
        <th>Jabatan Cek</th>
        <th>Penerima</th>
        <th>Jabatan Penerima</th>
            {{--<th colspan="3">Action</th>--}}
        </tr>
    </thead>
    <tbody>
    @foreach($asetPengembalians as $asetPengembalian)
        <tr>
            <td>{!! $asetPengembalian->nomor_surat !!}</td>
            <td>{!! $asetPengembalian->dataAset->grub_asets->nama !!}</td>
            <td>{!! $asetPengembalian->user->name !!}</td>
            <td>{!! $asetPengembalian->nama !!}</td>
            <td>{!! $asetPengembalian->nik !!}</td>
            <td>{!! $asetPengembalian->jabatan !!}</td>
            <td>{!! $asetPengembalian->departemen_id !!}</td>
            <td>{!! $asetPengembalian->lokasi !!}</td>
            <td>{!! $asetPengembalian->atasan_langsung !!}</td>
            <td>{!! $asetPengembalian->diserahkan !!}</td>
            <td>{!! $asetPengembalian->jabatan_diserahkan !!}</td>
            <td>{!! $asetPengembalian->cek !!}</td>
            <td>{!! $asetPengembalian->jabatan_cek !!}</td>
            <td>{!! $asetPengembalian->penerima !!}</td>
            <td>{!! $asetPengembalian->jabatan_penerima !!}</td>
            {{--<td>
                {!! Form::open(['route' => ['asetPengembalians.destroy', $asetPengembalian->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('asetPengembalians.show', [$asetPengembalian->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('asetPengembalians.edit', [$asetPengembalian->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>--}}
        </tr>
    @endforeach
    </tbody>
</table>