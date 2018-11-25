<table class="table table-responsive"="kategoriAsets-table">
    <thead>
        <tr>
            <th>Kode</th>
        <th>Nama</th>
        <th>Keterangan</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($kategoriAsets as $kategoriAset)
        <tr>
            <td>{!! $kategoriAset->kode !!}</td>
            <td>{!! $kategoriAset->nama !!}</td>
            <td>{!! $kategoriAset->keterangan !!}</td>
            <td>
                {!! Form::open(['route' => ['kategoriAsets.destroy', $kategoriAset->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('kategoriAsets.show', [$kategoriAset->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('kategoriAsets.edit', [$kategoriAset->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>