<table class="table table-striped table-bordered file-export">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Kode</th>
        <th>Nama</th>
        <th>Keterangan</th>
        <th>Parent Departemen Id</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($departemens as $departemen)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $departemen->kode !!}</td>
            <td>{!! $departemen->nama !!}</td>
            <td>{!! $departemen->keterangan !!}</td>
            <td>{!! $departemen->parent_departemen_id !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['departemens.destroy', $departemen->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('departemens.show', [$departemen->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('departemens.edit', [$departemen->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
