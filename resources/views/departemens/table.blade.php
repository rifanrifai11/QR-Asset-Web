<table class="table table-responsive"="departemens-table">
    <thead>
        <tr>
            <th>Kode</th>
        <th>Nama</th>
        <th>Keterangan</th>
        <th>Parent Departemen</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($departemens as $departemen)
        <tr>
            <td>{!! $departemen->kode !!}</td>
            <td>{!! $departemen->nama !!}</td>
            <td>{!! $departemen->keterangan !!}</td>
            <td>{!! $departemen->parent_departemen_id !!}</td>
            <td>
                {!! Form::open(['route' => ['departemens.destroy', $departemen->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('departemens.show', [$departemen->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('departemens.edit', [$departemen->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>