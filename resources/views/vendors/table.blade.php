<table class="table table-responsive"="vendors-table">
    <thead>
        <tr>
            <th>Kode Registrasi</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Kota</th>
        <th>Fax</th>
        <th>Email</th>
        <th>Attn</th>
        <th>Telepon</th>
        <th>Phone</th>
            <th colspan="3">Action</th>
        </tr>
    </thead>
    <tbody>
    @foreach($vendors as $vendor)
        <tr>
            <td>{!! $vendor->kode_registrasi !!}</td>
            <td>{!! $vendor->nama !!}</td>
            <td>{!! $vendor->alamat !!}</td>
            <td>{!! $vendor->kota !!}</td>
            <td>{!! $vendor->fax !!}</td>
            <td>{!! $vendor->email !!}</td>
            <td>{!! $vendor->attn !!}</td>
            <td>{!! $vendor->telepon !!}</td>
            <td>{!! $vendor->phone !!}</td>
            <td>
                {!! Form::open(['route' => ['vendors.destroy', $vendor->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('vendors.show', [$vendor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('vendors.edit', [$vendor->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>