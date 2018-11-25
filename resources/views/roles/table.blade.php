<table class="table table-striped table-bordered file-export">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Name</th>
        <th>Display Name</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($roles as $roles)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $roles->name !!}</td>
            <td>{!! $roles->display_name !!}</td>
            <td>{!! $roles->description !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['roles.destroy', $roles->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('roles.show', [$roles->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('roles.edit', [$roles->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
