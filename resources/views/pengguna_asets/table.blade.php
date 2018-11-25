<table class="table table-responsive"="penggunaAsets-table">
    <thead>
        <tr>
            <th>No Bast</th>
        <th>Nama</th>
        <th>Nrp</th>
        <th>Lokasi Kerja</th>
        <th>Departemen</th>
        <th>Atasan Langsung</th>
        <th>Pic Aset</th>
        <th>Posisi</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($penggunaAsets as $penggunaAset)
        <tr>
            <td>{!! $penggunaAset->no_bast !!}</td>
            <td>{!! $penggunaAset->nama !!}</td>
            <td>{!! $penggunaAset->nrp !!}</td>
            <td>{!! $penggunaAset->lokasi_kerja !!}</td>
            <td>{!! $penggunaAset->departemen_id !!}</td>
            <td>{!! $penggunaAset->atasan_langsung !!}</td>
            <td>{!! $penggunaAset->pic_aset !!}</td>
            <td>{!! $penggunaAset->posisi !!}</td>
            <td>
                {!! Form::open(['route' => ['penggunaAsets.destroy', $penggunaAset->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('penggunaAsets.show', [$penggunaAset->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('penggunaAsets.edit', [$penggunaAset->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>