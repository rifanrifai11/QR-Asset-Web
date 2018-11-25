<table class="table table-responsive"="asetBasts-table">
    <thead>
        <tr>
            <th>Nomor Surat</th>
        <th>Data Aset</th>
        <th>Users</th>
        <th>Tanggal Bast</th>
        <th>Nama</th>
        <th>Nik</th>
        <th>Departemen</th>
        <th>Jabatan</th>
        <th>Jobsite</th>
        <th>Atasan Langsung</th>
        <th>Diserahkan Oleh</th>
        <th>Jabatan Diserahkan</th>
        <th>Cek Oleh</th>
        <th>Jabatan Cek</th>
        <th>Penerima Oleh</th>
        <th>Jabatan Penerima</th>
            {{--<th colspan="3">Action</th>--}}
        </tr>
    </thead>
    <tbody>
    @foreach($asetBasts as $asetBast)
        <tr>
            <td>{!! $asetBast->nomor_surat !!}</td>
            <td>{!! $asetBast->dataAset->grub_asets->nama!!}</td>
            <td>{!! $asetBast->user->name !!}</td>
            <td>{!! \Carbon\Carbon::parse( $asetBast->tanggal_bast)->format('d-m-Y') !!}</td>
            <td>{!! $asetBast->nama !!}</td>
            <td>{!! $asetBast->nik !!}</td>
            <td>{!! $asetBast->departemen->nama !!}</td>
            <td>{!! $asetBast->jabatan !!}</td>
            <td>{!! $asetBast->jobsite->nama !!}</td>
            <td>{!! $asetBast->atasan_langsung !!}</td>
            <td>{!! $asetBast->diserahkan_oleh !!}</td>
            <td>{!! $asetBast->jabatan_diserahkan !!}</td>
            <td>{!! $asetBast->cek_oleh !!}</td>
            <td>{!! $asetBast->jabatan_cek !!}</td>
            <td>{!! $asetBast->penerima_oleh !!}</td>
            <td>{!! $asetBast->jabatan_penerima !!}</td>
            {{--<td>
                {!! Form::open(['route' => ['asetBasts.destroy', $asetBast->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('asetBasts.show', [$asetBast->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('asetBasts.edit', [$asetBast->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>--}}
        </tr>
    @endforeach
    </tbody>
</table>