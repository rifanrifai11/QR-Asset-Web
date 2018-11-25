<table class="table table-responsive"="umurEkonomis-table">
    <thead>
        <tr>
            <th>Nama</th>
        <th>Tahun</th>
        <th>Nilai Rumus</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($umurEkonomis as $umurEkonomis)
        <tr>
            <td>{!! $umurEkonomis->nama !!}</td>
            <td>{!! $umurEkonomis->tahun !!}</td>
            <td>{!! $umurEkonomis->nilai_rumus !!}</td>
            <td>
                {!! Form::open(['route' => ['umurEkonomis.destroy', $umurEkonomis->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('umurEkonomis.show', [$umurEkonomis->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('umurEkonomis.edit', [$umurEkonomis->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>