<table class="table table-striped table-bordered file-export">
    <thead>
    <tr class="text-center bg-grey bg-lighten-3 text-dark">
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Kontak</th>
        <th>Password</th>
        <th>Remember Token</th>
        <th>Alamat</th>
        <th>Foto</th>
        <th>Verified</th>
        <th>Verification Token</th>
        <th>Token Device</th>
        <th>Action</th>
    </tr>
    </thead>
    <tbody>
    @php
        $no = 1;
    @endphp
    @foreach($users as $users)
        <tr>
            <td class="text-center ">{!! $no++ !!}</td>
            <td>{!! $users->name !!}</td>
            <td>{!! $users->email !!}</td>
            <td>{!! $users->kontak !!}</td>
            <td>{!! $users->password !!}</td>
            <td>{!! $users->remember_token !!}</td>
            <td>{!! $users->alamat !!}</td>
            <td>{!! $users->foto !!}</td>
            <td>{!! $users->verified !!}</td>
            <td>{!! $users->verification_token !!}</td>
            <td>{!! $users->token_device !!}</td>
            <td class="text-center ">
                {!! Form::open(['route' => ['users.destroy', $users->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('users.show', [$users->id]) !!}" class='btn btn-icon btn-sm btn-outline-success'><i class="fa fa-eye"></i></a>
                    <a href="{!! route('users.edit', [$users->id]) !!}" class='btn btn-icon btn-sm btn-outline-warning'><i class="fa fa-pencil"></i></a>
                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-icon btn-sm btn-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
