<table class="table table-responsive"="tipes-table">
    <thead>
        <tr>
            <th>Nama</th>
        <th>Keterangan</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($tipes as $tipe)
        <tr>
            <td>{!! $tipe->nama !!}</td>
            <td>{!! $tipe->keterangan !!}</td>
            <td>
                {!! Form::open(['route' => ['tipes.destroy', $tipe->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('tipes.show', [$tipe->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('tipes.edit', [$tipe->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>