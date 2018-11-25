<table class="table table-responsive"="mereks-table">
    <thead>
        <tr>
            <th>Nama</th>
        <th>Keterangan</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($mereks as $merek)
        <tr>
            <td>{!! $merek->nama !!}</td>
            <td>{!! $merek->keterangan !!}</td>
            <td>
                {!! Form::open(['route' => ['mereks.destroy', $merek->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('mereks.show', [$merek->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('mereks.edit', [$merek->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>