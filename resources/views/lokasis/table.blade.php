<table class="table table-responsive" id="lokasis-table">
    <thead>
        <tr>
            <th>Nama</th>
        <th>Keterangan</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($lokasis as $lokasi)
        <tr>
            <td>{!! $lokasi->nama !!}</td>
            <td>{!! $lokasi->keterangan !!}</td>
            <td>
                {!! Form::open(['route' => ['lokasis.destroy', $lokasi->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('lokasis.show', [$lokasi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('lokasis.edit', [$lokasi->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>