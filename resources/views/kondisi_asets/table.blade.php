<table class="table table-responsive"="kondisiAsets-table">
    <thead>
        <tr><th>ID</th>
            <th>Nama</th>
        <th>Keterangan</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($kondisiAsets as $kondisiAset)
        <tr>
            <td>{!! $kondisiAset->id !!}</td>
            <td>{!! $kondisiAset->nama !!}</td>
            <td>{!! $kondisiAset->keterangan !!}</td>
            <td>
                {!! Form::open(['route' => ['kondisiAsets.destroy', $kondisiAset->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('kondisiAsets.show', [$kondisiAset->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('kondisiAsets.edit', [$kondisiAset->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>