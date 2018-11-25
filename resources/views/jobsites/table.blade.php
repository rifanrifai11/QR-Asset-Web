<table class="table table-responsive" id="jobsites-table">
    <thead>
        <tr>
            <th>Nama</th>
        <th>Keterangan</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($jobsites as $jobsite)
        <tr>
            <td>{!! $jobsite->nama !!}</td>
            <td>{!! $jobsite->keterangan !!}</td>
            <td>
                {!! Form::open(['route' => ['jobsites.destroy', $jobsite->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('jobsites.show', [$jobsite->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('jobsites.edit', [$jobsite->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>