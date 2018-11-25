<table class="table table-striped table-bordered file-export">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Nama</th>
        <th>Keterangan</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($mereks as $merek)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $merek->nama !!}</td>
            <td>{!! $merek->keterangan !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['mereks.destroy', $merek->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('mereks.show', [$merek->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('mereks.edit', [$merek->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
