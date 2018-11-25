<table class="table table-responsive"="grubAsets-table">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Nama</th>
        <th>Parent Grub Aset</th>
            <th>Umur Ekonomis</th>
            <th>Kategori</th>
        <th>Keterangan</th>

            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($grubAsets as $grubAset)
        <tr>
            <td>{!! $grubAset->kode !!}</td>
            <td>{!! $grubAset->nama !!}</td>
            <td>{!! $grubAset->parent->nama or ''!!}</td>
            <td>{!! $grubAset->umurEkonomis->nama or '' !!}</td>
            <td>{!! $grubAset->kategori_aset->nama or '' !!}</td>
            <td>{!! $grubAset->keterangan !!}</td>

            <td>
                {!! Form::open(['route' => ['grubAsets.destroy', $grubAset->kode], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('grubAsets.show', [$grubAset->kode]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('grubAsets.edit', [$grubAset->kode]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>